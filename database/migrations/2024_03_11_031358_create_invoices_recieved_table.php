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
        Schema::create('invoices_recieved', function (Blueprint $table) {
            $table->id('invoicesRecievedID');
            $table->bigInteger('goodsRecievedID')->unsigned();
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
        Schema::dropIfExists('invoices_recieved');
    }
};
