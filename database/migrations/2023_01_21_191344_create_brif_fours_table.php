<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrifFoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brif_fours', function (Blueprint $table) {
            $table->id();
            $table->string('smm_sirketadi')->nullable();
            $table->string('smm_sirketsahesi')->nullable();
            $table->string('smm_sirkethaqqinda')->nullable();
            $table->string('web_gosteris')->nullable();
            $table->string('smm_ayligpost')->nullable();
            $table->string('smm_gozlenti')->nullable();
            $table->string('smm_ayligbudce')->nullable();
            $table->string('smm_reqibler')->nullable();
            $table->string('smm_cavablandirma')->nullable();
            $table->string('smm_ad')->nullable();
            $table->string('smm_vezife')->nullable();
            $table->string('smm_telefon')->nullable();
            $table->string('smm_email')->nullable();
            $table->string('smm_vaxt')->nullable();
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
        Schema::dropIfExists('brif_fours');
    }
}
