<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', static function (Blueprint $table) {
            $table->id();
            $table->string('src')->nullable();
            $table->string('alt')->nullable();
            $table->string('name_az')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('slug_az')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('slug_ru')->nullable();
            $table->boolean('on_home')->default(0)->comment('0 - not, 1 - on home');
            $table->integer('order_no')->nullable();
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
        Schema::dropIfExists('services');
    }
}
