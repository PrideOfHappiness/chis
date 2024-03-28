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
        Schema::create('histori_beli', function (Blueprint $table) {
            $table->id('historiPembelianID');
            $table->date('pembelianDate');
            $table->bigInteger('purchaseOrderIDs')->unsigned();
            $table->string('stock_no');
            $table->bigInteger('part_no')->unsigned();
            $table->integer('price');
            $table->integer('qty');
            $table->integer('tunai');
            $table->integer('kredit');
            $table->integer('total');
            $table->integer('sub_total');
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
        Schema::dropIfExists('histori_beli');
    }
};
