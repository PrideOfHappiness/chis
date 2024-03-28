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
        Schema::create('goods_recieved_notes', function (Blueprint $table) {
            $table->id('goodsRecievedID');
            $table->integer('code');
            $table->date('tanggalPenerimaan');
            $table->bigInteger('warehouseID')->unsigned();
            $table->bigInteger('purchaseOrderID')->unsigned();
            $table->timestamps();

            $table->foreign('warehouseID')->references('warehouseID')->on('warehouse');
            $table->foreign('purchaseOrderID')->references('purchaseOrderID')->on('purchase_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods_recieved_notes');
    }
};
