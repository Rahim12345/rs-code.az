<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('link_clicks', function (Blueprint $table) {
            $table->id();
            $table->string('href', 500)->index();        // clicked link
            $table->string('page', 500)->nullable();     // page it was clicked on
            $table->string('text', 200)->nullable();     // link anchor text
            $table->string('type', 20)->default('internal'); // internal / external / phone / email
            $table->string('ip', 45)->nullable();
            $table->date('date')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('link_clicks');
    }
};
