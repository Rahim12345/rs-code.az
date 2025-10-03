<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('company_id');
            $table->string('src')->nullable();
            $table->string('alt')->nullable();
            $table->string('link')->nullable();
            $table->string('title_az')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('slug_az')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('slug_ru')->nullable();
            $table->text('text_az')->nullable();
            $table->text('text_en')->nullable();
            $table->text('text_ru')->nullable();
            $table->integer('hits')->default(0);
            $table->integer('order_no')->default(0);
            $table->timestamps();

            $table->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onDelete('cascade');

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
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
        Schema::dropIfExists('products');
    }
}
