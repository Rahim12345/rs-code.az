<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVebGostericisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veb_gostericis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brif_veb_id');
            $table->unsignedBigInteger('veb_vesait_id');
            $table->timestamps();

            $table->foreign('brif_veb_id')
                ->references('id')
                ->on('brif_vebs')
                ->onDelete('cascade');

            $table->foreign('veb_vesait_id')
                ->references('id')
                ->on('veb_vesaits')
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
        Schema::dropIfExists('veb_gostericis');
    }
}
