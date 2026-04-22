<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportNotes extends Command
{
    protected $signature   = 'notes:import {file? : Path to SQL dump (default: u623198832_blog.sql in project root)}';
    protected $description = 'Import notes from exported SQL dump (blogs table)';

    public function handle(): int
    {
        $sqlFile = $this->argument('file') ?? base_path('u623198832_blog.sql');

        if (!file_exists($sqlFile)) {
            $this->error("File not found: $sqlFile");
            return 1;
        }

        $host   = config('database.connections.mysql.host', '127.0.0.1');
        $port   = config('database.connections.mysql.port', '3306');
        $user   = config('database.connections.mysql.username', 'root');
        $pass   = config('database.connections.mysql.password', '');
        $dbname = config('database.connections.mysql.database');

        $this->info("Reading SQL file...");

        // ---- Read line-by-line, gather INSERT blocks for `blogs` ----
        $lines       = file($sqlFile, FILE_IGNORE_NEW_LINES);
        $insertBlocks = [];
        $collecting   = false;
        $buffer       = '';

        foreach ($lines as $line) {
            if (!$collecting && str_contains($line, 'INSERT INTO `blogs`')) {
                $collecting = true;
                $buffer     = $line . "\n";
                continue;
            }

            if ($collecting) {
                $buffer .= $line . "\n";
                $trimmed = rtrim($line);
                // Each INSERT block's last row ends with ); (semicolon, not comma)
                // Heuristic: line ends with '); where before is a datetime
                if (preg_match('/\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}\'\);$/', $trimmed)) {
                    $insertBlocks[] = str_replace('INSERT INTO `blogs`', 'INSERT INTO `_import_blogs`', $buffer);
                    $buffer     = '';
                    $collecting = false;
                }
            }
        }

        if (empty($insertBlocks)) {
            $this->error('No INSERT blocks found for `blogs` table.');
            return 1;
        }

        $this->info('Found ' . count($insertBlocks) . ' INSERT block(s).');

        // ---- Build temp SQL ----
        $createSql = <<<SQL
DROP TABLE IF EXISTS `_import_blogs`;
CREATE TABLE `_import_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titleEn` varchar(191) DEFAULT NULL,
  `titleAz` varchar(191) DEFAULT NULL,
  `slugEn` varchar(191) DEFAULT NULL,
  `slugAz` varchar(191) DEFAULT NULL,
  `blogEn` longtext DEFAULT NULL,
  `blogAz` longtext DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
SQL;

        $tempSql = $createSql . "\n\n" . implode("\n", $insertBlocks);
        $tmpFile = sys_get_temp_dir() . '/notes_import_' . time() . '.sql';
        file_put_contents($tmpFile, $tempSql);

        $this->info("Temp SQL file: " . strlen($tempSql) . " bytes");

        $passArg = $pass !== '' ? "-p\"$pass\"" : '';
        $mysqlBin = 'C:\\laragon\\bin\\mysql\\mysql-8.0.30-winx64\\bin\\mysql.exe';
        $cmd = "\"$mysqlBin\" --binary-mode -h$host -P$port -u$user $passArg $dbname < \"$tmpFile\" 2>&1";

        $this->info("Loading staging table...");
        $output = shell_exec($cmd);
        if ($output) {
            $this->warn("mysql: " . trim($output));
        }

        if (!DB::getSchemaBuilder()->hasTable('_import_blogs')) {
            $this->error('Staging table not created.');
            @unlink($tmpFile);
            return 1;
        }

        $total = DB::table('_import_blogs')->count();
        $this->info("Staging table has $total rows. Importing...");

        $imported = $skipped = 0;

        DB::table('_import_blogs')->orderBy('id')->chunk(50, function ($rows) use (&$imported, &$skipped) {
            foreach ($rows as $row) {
                if (DB::table('notes')
                    ->where('title_en', $row->titleEn)
                    ->where('title_az', $row->titleAz)
                    ->exists()) {
                    $skipped++;
                    continue;
                }
                DB::table('notes')->insert([
                    'title_en'         => $row->titleEn,
                    'title_az'         => $row->titleAz,
                    'body_en'          => $row->blogEn,
                    'body_az'          => $row->blogAz,
                    'note_category_id' => $row->category_id,
                    'created_at'       => $row->created_at,
                    'updated_at'       => $row->updated_at,
                ]);
                $imported++;
            }
        });

        DB::statement('DROP TABLE IF EXISTS `_import_blogs`');
        @unlink($tmpFile);

        $this->info("Done. Imported: $imported | Skipped (duplicates): $skipped");
        return 0;
    }
}
