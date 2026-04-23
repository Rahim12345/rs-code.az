<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('meta_title_az')->nullable()->after('date_ru');
            $table->string('meta_title_en')->nullable()->after('meta_title_az');
            $table->string('meta_title_ru')->nullable()->after('meta_title_en');
            $table->text('meta_description_az')->nullable()->after('meta_title_ru');
            $table->text('meta_description_en')->nullable()->after('meta_description_az');
            $table->text('meta_description_ru')->nullable()->after('meta_description_en');
            $table->string('meta_keywords_az')->nullable()->after('meta_description_ru');
            $table->string('meta_keywords_en')->nullable()->after('meta_keywords_az');
            $table->string('meta_keywords_ru')->nullable()->after('meta_keywords_en');
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn([
                'meta_title_az', 'meta_title_en', 'meta_title_ru',
                'meta_description_az', 'meta_description_en', 'meta_description_ru',
                'meta_keywords_az', 'meta_keywords_en', 'meta_keywords_ru',
            ]);
        });
    }
};
