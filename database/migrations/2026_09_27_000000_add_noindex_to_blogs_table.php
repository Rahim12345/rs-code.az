<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Zəif (ümumi, lokal olmayan) bloqları Google indeksindən çıxarmaq üçün bayraq.
     */
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->boolean('noindex')->default(false)->after('views');
        });

        // SEO strategiyasına görə zəif 4 bloq
        DB::table('blogs')->whereIn('slug_az', [
            'mobil-tetbiqlerin-geleceyi-2026',
            'kibertehlukesizlik-kicik-biznes-ucun-esaslar',
            'suni-zeka-biznes-helleri',
            'ui-ux-dizayninda-2026-trendleri',
        ])->update(['noindex' => true]);
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('noindex');
        });
    }
};
