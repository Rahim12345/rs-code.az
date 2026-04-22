<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('name_az')->nullable()->after('id');
            $table->string('name_en')->nullable()->after('name_az');
            $table->string('name_ru')->nullable()->after('name_en');
            $table->string('slug_az')->nullable()->after('slug');
            $table->string('slug_en')->nullable()->after('slug_az');
            $table->string('slug_ru')->nullable()->after('slug_en');
            $table->text('description_az')->nullable()->after('slug_ru');
            $table->text('description_en')->nullable()->after('description_az');
            $table->text('description_ru')->nullable()->after('description_en');
            $table->string('tarix_az')->nullable()->after('tarix');
            $table->string('tarix_en')->nullable()->after('tarix_az');
            $table->string('tarix_ru')->nullable()->after('tarix_en');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'name_az','name_en','name_ru',
                'slug_az','slug_en','slug_ru',
                'description_az','description_en','description_ru',
                'tarix_az','tarix_en','tarix_ru',
            ]);
        });
    }
};
