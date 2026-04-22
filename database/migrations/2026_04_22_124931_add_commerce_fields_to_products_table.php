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
        Schema::table('products', function (Blueprint $table) {
            $table->string('sku')->nullable()->after('alt');           // barkod / məhsul kodu
            $table->decimal('price', 10, 2)->nullable()->after('sku'); // satış qiyməti
            $table->decimal('price_old', 10, 2)->nullable()->after('price'); // köhnə / endirimli qiymət
            $table->string('unit', 50)->nullable()->after('price_old'); // ölçü vahidi: əd, kq, l ...
            $table->integer('stock')->nullable()->after('unit');        // stok (null = limitsiz)
            $table->tinyInteger('status')->default(1)->after('stock'); // 1=aktiv, 0=deaktiv
            $table->tinyInteger('featured')->default(0)->after('status'); // əsas səhifədə göstər
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['sku','price','price_old','unit','stock','status','featured']);
        });
    }
};
