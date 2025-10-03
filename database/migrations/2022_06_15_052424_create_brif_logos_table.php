<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrifLogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brif_logos', function (Blueprint $table) {
            $table->id();
            $table->text('sirketadi')->nullable();
            $table->text('logotip')->nullable();
            $table->text('fealiyyetsahesi')->nullable();
            $table->text('prespektiv')->nullable();
            $table->text('reqibler')->nullable();
            $table->text('fealiyyetdairesi')->nullable();
            $table->string('movcudlogo')->nullable();
            $table->text('reng')->nullable();
            $table->text('logotipvacibliyi')->nullable();
            $table->integer('logotipsecimi')->nullable();
            $table->text('diger')->nullable();
            $table->text('basqaarzu')->nullable();
            $table->string('ad')->nullable();
            $table->string('vezife')->nullable();
            $table->string('telefon')->nullable();
            $table->string('email')->nullable();
            $table->string('vaxt')->nullable();
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
        Schema::dropIfExists('brif_logos');
    }
}
