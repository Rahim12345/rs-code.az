<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PullBlogs extends Command
{
    protected $signature = 'blog:pull
        {--dry-run : Nə edəcəyini göstər, əslində etmə}
        {--only=all : Nəyi çək: all, db, images}';

    protected $description = 'Prod serverdəki blogları və şəkilləri lokal mühitə çək (SSH vasitəsilə)';

    public function handle(): int
    {
        $cfg = $this->loadConfig();
        if (!$cfg) {
            return 1;
        }

        $dryRun = $this->option('dry-run');
        $only   = $this->option('only');

        if ($only !== 'images') {
            $ok = $this->pullDatabase($cfg, $dryRun);
            if (!$ok) {
                return 1;
            }
        }

        if ($only !== 'db') {
            $this->pullImages($cfg, $dryRun);
        }

        $this->newLine();
        $this->info($dryRun ? '[dry-run] Bitdi.' : 'Pull tamamlandı!');
        return 0;
    }

    // -------------------------------------------------------------------------

    private function pullDatabase(array $cfg, bool $dryRun): bool
    {
        $this->newLine();
        $this->line('<comment>--- Verilənlər bazası pull ---</comment>');

        $localHost = config('database.connections.mysql.host', '127.0.0.1');
        $localPort = config('database.connections.mysql.port', '3306');
        $localUser = config('database.connections.mysql.username', 'root');
        $localPass = config('database.connections.mysql.password', '');
        $localDb   = config('database.connections.mysql.database');

        if ($dryRun) {
            $this->line('[dry-run] Prod-dan mysqldump çəkilərdi və lokal DB-yə import edilərdi');
            $this->line("  Prod:  {$cfg['db_name']} → Lokal: {$localDb}");
            return true;
        }

        // Remote script is sent via SSH stdin — avoids all command-line quoting issues.
        // MYSQL_PWD is single-quote-escaped for the remote bash shell.
        $passEnv      = $cfg['db_pass'] ? 'MYSQL_PWD=' . $this->bashEscape($cfg['db_pass']) . ' ' : '';
        $remoteScript = $passEnv . implode(' ', [
            'mysqldump',
            "-h{$cfg['db_host']}",
            "-u{$cfg['db_user']}",
            '--no-create-info',
            '--replace',
            '--single-transaction',
            '--skip-triggers',
            $cfg['db_name'],
            'blogs',
        ]);

        // SSH: run bash and feed the script via stdin
        $sshArgs  = ['ssh', '-p', (string) $cfg['port'], '-o', 'StrictHostKeyChecking=no',
                     "{$cfg['user']}@{$cfg['host']}", 'bash'];
        $sshProc  = proc_open($sshArgs, [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => STDERR], $sshPipes);

        if (!is_resource($sshProc)) {
            $this->error('SSH prosesi başlamadı');
            return false;
        }

        fwrite($sshPipes[0], $remoteScript . "\n");
        fclose($sshPipes[0]);

        // Local mysql via proc_open with array args — no shell, so MYSQL_PWD env is all we need
        $mysqlArgs = ['mysql', '--binary-mode', "-h{$localHost}", "-P{$localPort}", "-u{$localUser}", $localDb];
        $localEnv  = $localPass !== '' ? array_merge(getenv(), ['MYSQL_PWD' => $localPass]) : null;
        $mysqlProc = proc_open($mysqlArgs, [0 => $sshPipes[1], 1 => STDOUT, 2 => STDERR], $mysqlPipes, null, $localEnv);

        if (!is_resource($mysqlProc)) {
            proc_close($sshProc);
            $this->error('mysql prosesi başlamadı');
            return false;
        }

        $this->line('Prod DB-dən çəkilir... (şifrə soruşulacaq)');

        // Close mysql first (drains SSH stdout), then SSH
        $mysqlExit = proc_close($mysqlProc);
        $sshExit   = proc_close($sshProc);

        if ($sshExit !== 0 || $mysqlExit !== 0) {
            $this->error("DB pull uğursuz (dump: {$sshExit}, import: {$mysqlExit})");
            return false;
        }

        $this->info('DB pull OK');
        return true;
    }

    private function pullImages(array $cfg, bool $dryRun): void
    {
        $this->newLine();
        $this->line('<comment>--- Şəkillər pull ---</comment>');

        $remoteImgDir = rtrim($cfg['path'], '/') . '/public/images/blog';
        $localImgDir  = public_path('images/blog');

        if ($dryRun) {
            $this->line('[dry-run] Prod şəkilləri lokal images/blog/ qovluğuna kopyalanardı');
            $this->line("  Mənbə: {$cfg['user']}@{$cfg['host']}:{$remoteImgDir}");
            $this->line("  Hədəf: {$localImgDir}");
            return;
        }

        if (!is_dir($localImgDir)) {
            mkdir($localImgDir, 0755, true);
        }

        $ssh = $this->sshBase($cfg);

        // Pipe: ssh tar -czf | local tar -xzf
        // Convert Windows backslashes so tar -C receives a valid path on all platforms
        $localImgDirNorm = str_replace('\\', '/', $localImgDir);
        $tarRemote = "tar -czf - -C \"{$remoteImgDir}\" .";
        $tarLocal  = "tar -xzf - -C \"{$localImgDirNorm}\"";
        $cmd       = "{$ssh} \"{$tarRemote}\" | {$tarLocal}";

        $this->line('Prod şəkilləri çəkilir... (şifrə soruşulacaq)');
        passthru($cmd, $exit);

        $exit === 0
            ? $this->info('Şəkillər pull OK')
            : $this->error("Şəkil pull uğursuz (exit: {$exit})");
    }

    // -------------------------------------------------------------------------

    private function loadConfig(): ?array
    {
        $required = [
            'DEPLOY_SSH_HOST'     => 'SSH host',
            'DEPLOY_SSH_USER'     => 'SSH istifadəçi',
            'DEPLOY_SSH_PATH'     => 'Serverdə public_html yolu',
            'DEPLOY_PROD_DB_NAME' => 'Prod DB adı',
            'DEPLOY_PROD_DB_USER' => 'Prod DB istifadəçisi',
        ];

        $missing = array_filter($required, fn($label, $key) => empty(env($key)), ARRAY_FILTER_USE_BOTH);

        if ($missing) {
            $this->error('.env-də deploy parametrləri çatışmır: ' . implode(', ', array_keys($missing)));
            return null;
        }

        return [
            'host'    => env('DEPLOY_SSH_HOST'),
            'user'    => env('DEPLOY_SSH_USER'),
            'port'    => env('DEPLOY_SSH_PORT', 22),
            'path'    => env('DEPLOY_SSH_PATH'),
            'db_host' => env('DEPLOY_PROD_DB_HOST', 'localhost'),
            'db_name' => env('DEPLOY_PROD_DB_NAME'),
            'db_user' => env('DEPLOY_PROD_DB_USER'),
            'db_pass' => env('DEPLOY_PROD_DB_PASS', ''),
        ];
    }

    private function sshBase(array $cfg): string
    {
        return "ssh -p {$cfg['port']} -o StrictHostKeyChecking=no {$cfg['user']}@{$cfg['host']}";
    }

    private function bashEscape(string $value): string
    {
        // Safe single-quote escaping for any bash shell string
        return "'" . str_replace("'", "'\\''", $value) . "'";
    }
}
