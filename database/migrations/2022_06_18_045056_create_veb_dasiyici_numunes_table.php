<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVebDasiyiciNumunesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veb_dasiyici_numunes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('veb_dasiyici_id');
            $table->string('name_az')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('link')->nullable();
            $table->timestamps();

            $table->foreign('veb_dasiyici_id')
                ->references('id')
                ->on('veb_dasiyicis')
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
        Schema::dropIfExists('veb_dasiyici_numunes');
    }
}
