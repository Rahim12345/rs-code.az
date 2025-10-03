<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrifVebsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brif_vebs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('web_sirketadi')->nullable();
            $table->string('web_logotip')->nullable();
            $table->string('web_fealiyyetsahesi')->nullable();
            $table->string('web_prespektiv')->nullable();
            $table->string('web_reqibler')->nullable();
            $table->string('web_firmastilidiger')->nullable();
            $table->string('web_gosterisvesaitidiger')->nullable();
            $table->boolean('web_az')->nullable();
            $table->boolean('web_en')->nullable();
            $table->boolean('web_ru')->nullable();
            $table->string('web_qeydler')->nullable();
            $table->string('web_menu')->nullable();
            $table->boolean('web_imkanlar1')->nullable();
            $table->boolean('web_imkanlar2')->nullable();
            $table->boolean('web_imkanlar3')->nullable();
            $table->boolean('web_imkanlar4')->nullable();
            $table->boolean('web_imkanlar5')->nullable();
            $table->string('web_ad')->nullable();
            $table->string('web_vezife')->nullable();
            $table->string('web_telefon')->nullable();
            $table->string('web_email')->nullable();
            $table->string('web_vaxt')->nullable();
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
        Schema::dropIfExists('brif_vebs');
    }
}
