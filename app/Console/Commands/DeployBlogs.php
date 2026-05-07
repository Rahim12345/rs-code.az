<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeployBlogs extends Command
{
    protected $signature = 'blog:deploy
        {--dry-run : Nə edəcəyini göstər, əslində etmə}
        {--only=all : Nəyi deploy et: all, db, images}';

    protected $description = 'Lokal blogları və şəkilləri SSH vasitəsilə prod serverə göndər';

    public function handle(): int
    {
        $cfg = $this->loadConfig();
        if (!$cfg) {
            return 1;
        }

        $dryRun = $this->option('dry-run');
        $only   = $this->option('only');

        $blogs = DB::table('blogs')->orderBy('id')->get();

        if ($blogs->isEmpty()) {
            $this->info('Lokal verilənlər bazasında heç bir blog tapılmadı.');
            return 0;
        }

        $this->info("Tapıldı: {$blogs->count()} blog");

        if ($only !== 'images') {
            $this->syncDatabase($blogs, $cfg, $dryRun);
        }

        if ($only !== 'db') {
            $this->syncImages($blogs, $cfg, $dryRun);
        }

        $this->newLine();
        $this->info($dryRun ? '[dry-run] Bitdi.' : 'Deploy tamamlandı!');
        return 0;
    }

    // -------------------------------------------------------------------------

    private function syncDatabase($blogs, array $cfg, bool $dryRun): void
    {
        $this->newLine();
        $this->line('<comment>--- Verilənlər bazası sync ---</comment>');

        $columns = [
            'id',
            'slug_az', 'slug_en', 'slug_ru',
            'title_az', 'title_ru', 'title_en',
            'review_az', 'review_ru', 'review_en',
            'text_az', 'text_ru', 'text_en',
            'date_az', 'date_ru', 'date_en',
            'photo', 'photo_en', 'photo_ru',
            'meta_title_az', 'meta_title_en', 'meta_title_ru',
            'meta_description_az', 'meta_description_en', 'meta_description_ru',
            'meta_keywords_az', 'meta_keywords_en', 'meta_keywords_ru',
            'created_at', 'updated_at',
        ];

        // Only include columns that actually exist on the result objects
        $existing = array_filter($columns, fn($c) => property_exists($blogs->first(), $c));
        $colList  = '`' . implode('`, `', $existing) . '`';

        $updateParts = array_map(
            fn($c) => "`{$c}` = VALUES(`{$c}`)",
            array_filter($existing, fn($c) => $c !== 'id')
        );
        $updateClause = implode(",\n  ", $updateParts);

        $rows = [];
        foreach ($blogs as $blog) {
            $vals = [];
            foreach ($existing as $col) {
                $v      = $blog->$col ?? null;
                $vals[] = $v === null ? 'NULL' : "'" . addslashes($v) . "'";
            }
            $rows[] = '(' . implode(', ', $vals) . ')';
        }

        $sql = implode("\n", [
            'SET NAMES utf8mb4;',
            'SET foreign_key_checks = 0;',
            '',
            "INSERT INTO `blogs` ({$colList})",
            'VALUES',
            implode(",\n", $rows),
            "ON DUPLICATE KEY UPDATE",
            "  {$updateClause};",
        ]);

        $this->line('SQL ölçüsü: ' . number_format(strlen($sql)) . ' bayt, ' . $blogs->count() . ' sətir');

        if ($dryRun) {
            $this->line('[dry-run] Prod DB-yə yüklənərdi');
            return;
        }

        $tmpLocal = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'blogs_deploy_' . time() . '.sql';
        file_put_contents($tmpLocal, $sql);

        // Pipe SQL directly through SSH — 1 password prompt (no SCP needed)
        $passArg  = $cfg['db_pass'] ? "-p'" . addslashes($cfg['db_pass']) . "'" : '';
        $mysqlCmd = "mysql -h{$cfg['db_host']} -u{$cfg['db_user']} {$passArg} {$cfg['db_name']}";
        $ssh      = $this->sshBase($cfg);
        $cmd      = "{$ssh} \"{$mysqlCmd}\" < \"{$tmpLocal}\"";

        $this->line('Prod DB-yə göndərilir... (şifrə soruşulacaq)');
        passthru($cmd, $exit);
        @unlink($tmpLocal);

        $exit === 0
            ? $this->info("DB sync OK — {$blogs->count()} blog")
            : $this->error("DB import uğursuz (exit: {$exit})");
    }

    private function syncImages($blogs, array $cfg, bool $dryRun): void
    {
        $this->newLine();
        $this->line('<comment>--- Şəkillər sync ---</comment>');

        $localDir  = public_path('images/blog');
        $remoteDir = rtrim($cfg['path'], '/') . '/public/images/blog';

        $needed = [];
        foreach ($blogs as $blog) {
            foreach (['photo', 'photo_en', 'photo_ru'] as $field) {
                if (!empty($blog->$field)) {
                    $needed[$blog->$field] = true;
                }
            }
        }

        $toUpload = [];
        $notFound = [];

        foreach (array_keys($needed) as $img) {
            file_exists("{$localDir}/{$img}") ? $toUpload[] = $img : $notFound[] = $img;
        }

        $this->line('Yüklənəcək şəkil sayı: ' . count($toUpload));

        if ($notFound) {
            $this->warn('Lokal tapılmadı (atlandı): ' . implode(', ', $notFound));
        }

        if (empty($toUpload)) {
            $this->info('Yükləniləcək şəkil yoxdur.');
            return;
        }

        if ($dryRun) {
            foreach ($toUpload as $img) {
                $this->line("[dry-run] Yüklənərdi: images/blog/{$img}");
            }
            return;
        }

        // Pack with PHP PharData — avoids shell tar path issues on Windows
        $ts        = time();
        $tarBase   = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'blog_images_' . $ts;
        $tarFile   = $tarBase . '.tar';
        $tgzFile   = $tarBase . '.tar.gz';
        $tarRemote = '/tmp/blog_images_' . $ts . '.tar.gz';

        try {
            $phar = new \PharData($tarFile);
            foreach ($toUpload as $img) {
                $phar->addFile($localDir . DIRECTORY_SEPARATOR . $img, $img);
            }
            $phar->compress(\Phar::GZ);
            unlink($tarFile);
        } catch (\Throwable $e) {
            $this->error('Arxiv yaratmaq uğursuz: ' . $e->getMessage());
            @unlink($tarFile);
            return;
        }

        $size = round(filesize($tgzFile) / 1024, 1);
        $this->line("Arxiv: {$size} KB");

        $ssh        = $this->sshBase($cfg);
        $tgzEscaped = escapeshellarg($tgzFile);
        $scp        = "scp -P {$cfg['port']} {$tgzEscaped} {$cfg['user']}@{$cfg['host']}:{$tarRemote}";

        $this->line('Yüklənir...');
        passthru($scp, $exit);

        if ($exit !== 0) {
            $this->error('SCP uğursuz oldu.');
            @unlink($tgzFile);
            return;
        }

        $extractCmd = "mkdir -p {$remoteDir} && tar -xzf {$tarRemote} -C {$remoteDir} && rm -f {$tarRemote}";
        passthru("{$ssh} \"{$extractCmd}\"", $exit);
        @unlink($tgzFile);

        $exit === 0
            ? $this->info('Şəkillər OK — ' . count($toUpload) . ' fayl')
            : $this->error("Şəkil extract uğursuz (exit: {$exit})");
    }

    // -------------------------------------------------------------------------

    private function loadConfig(): ?array
    {
        $required = [
            'DEPLOY_SSH_HOST'    => 'SSH host (məs: rs-code.az)',
            'DEPLOY_SSH_USER'    => 'SSH istifadəçi adı',
            'DEPLOY_SSH_PATH'    => 'Serverdə public_html yolu',
            'DEPLOY_PROD_DB_NAME' => 'Prod DB adı',
            'DEPLOY_PROD_DB_USER' => 'Prod DB istifadəçisi',
        ];

        $missing = [];
        foreach ($required as $key => $label) {
            if (empty(env($key))) {
                $missing[] = "  {$key}  ({$label})";
            }
        }

        if ($missing) {
            $this->error('.env-də deploy parametrləri çatışmır:');
            foreach ($missing as $m) {
                $this->line($m);
            }
            $this->newLine();
            $this->line('Nümunə:');
            $this->line('  DEPLOY_SSH_HOST=rs-code.az');
            $this->line('  DEPLOY_SSH_USER=u623198832');
            $this->line('  DEPLOY_SSH_PORT=65002');
            $this->line('  DEPLOY_SSH_PATH=/home/u623198832/domains/rs-code.az/public_html');
            $this->line('  DEPLOY_PROD_DB_HOST=127.0.0.1');
            $this->line('  DEPLOY_PROD_DB_NAME=u623198832_rs_code');
            $this->line('  DEPLOY_PROD_DB_USER=u623198832_rs_code');
            $this->line('  DEPLOY_PROD_DB_PASS=your_password');
            return null;
        }

        return [
            'host'    => env('DEPLOY_SSH_HOST'),
            'user'    => env('DEPLOY_SSH_USER'),
            'port'    => env('DEPLOY_SSH_PORT', 22),
            'path'    => env('DEPLOY_SSH_PATH'),
            'db_host' => env('DEPLOY_PROD_DB_HOST', '127.0.0.1'),
            'db_name' => env('DEPLOY_PROD_DB_NAME'),
            'db_user' => env('DEPLOY_PROD_DB_USER'),
            'db_pass' => env('DEPLOY_PROD_DB_PASS', ''),
        ];
    }

    private function sshBase(array $cfg): string
    {
        return "ssh -p {$cfg['port']} -o StrictHostKeyChecking=no {$cfg['user']}@{$cfg['host']}";
    }

    // Convert Windows path (C:\foo or C:/foo) to MSYS /c/foo so Git-for-Windows tar
    // does not interpret the drive letter as a remote hostname.
    private function msysPath(string $path): string
    {
        $path = str_replace('\\', '/', $path);
        return preg_replace_callback('/^([A-Za-z]):/', fn($m) => '/' . strtolower($m[1]), $path);
    }
}
