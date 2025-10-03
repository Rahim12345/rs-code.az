<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrifThreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brif_threes', function (Blueprint $table) {
            $table->id();
            $table->string('adlandirma_sirketadi')->nullable();
            $table->string('adlandirma_seqment')->nullable();
            $table->string('adlandirma_hedef')->nullable();
            $table->string('adlandirma_ugurluadlar')->nullable();
            $table->string('adlandirma_teessurat')->nullable();
            $table->string('adlandirma_xaricidil')->nullable();
            $table->string('adlandirma_sozlerinsayi')->nullable();
            $table->string('adlandirma_elaveistek')->nullable();
            $table->string('adlandirma_ad')->nullable();
            $table->string('adlandirma_vezife')->nullable();
            $table->string('adlandirma_telefon')->nullable();
            $table->string('adlandirma_email')->nullable();
            $table->string('adlandirma_vaxt')->nullable();
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
        Schema::dropIfExists('brif_threes');
    }
}
