<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title_az');
            $table->string('title_ru');
            $table->string('title_en');
            $table->text('review_az');
            $table->text('review_ru');
            $table->text('review_en');
            $table->text('text_az');
            $table->text('text_ru');
            $table->text('text_en');
            $table->string('date_az');
            $table->string('date_ru');
            $table->string('date_en');
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
