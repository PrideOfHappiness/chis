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
        Schema::create('histori_harga_beli', function (Blueprint $table) {
            $table->id('historiHargaPembelianID');
            $table->bigInteger('purchaseOrderIDs')->unsigned();
            $table->string('stock_no');
            $table->bigInteger('part_no')->unsigned();
            $table->integer('price');
            $table->integer('qty');
            $table->string('notes');
            $table->timestamps();

            $table->foreign('purchaseOrderIDs')->references('purchaseOrderID')->on('purchase_order');
            $table->foreign('part_no')->references('productID')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histori_harga_beli');
    }
};
