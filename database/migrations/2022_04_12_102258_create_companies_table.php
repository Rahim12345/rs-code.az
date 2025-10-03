<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', static function (Blueprint $table) {
            $table->id();
            $table->string('src')->nullable();
            $table->string('alt')->nullable();
            $table->string('category_id')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->text('about_az')->nullable();
            $table->text('about_en')->nullable();
            $table->text('about_ru')->nullable();
            $table->unsignedBigInteger('group_id');
            $table->timestamps();

            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
