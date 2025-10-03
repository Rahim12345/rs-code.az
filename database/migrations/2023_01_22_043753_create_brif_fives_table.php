<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrifFivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brif_fives', function (Blueprint $table) {
            $table->id();
            $table->string('seo_sirketadi')->nullable();
            $table->string('seo_sirketsahesi')->nullable();
            $table->string('seo_sirkethaqqinda')->nullable();
            $table->string('seo_vebsayt')->nullable();
            $table->string('seo_acarsozler')->nullable();
            $table->string('seo_budce')->nullable();
            $table->string('seo_ad')->nullable();
            $table->string('seo_vezife')->nullable();
            $table->string('seo_telefon')->nullable();
            $table->string('seo_email')->nullable();
            $table->string('seo_vaxt')->nullable();
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
        Schema::dropIfExists('brif_fives');
    }
}
