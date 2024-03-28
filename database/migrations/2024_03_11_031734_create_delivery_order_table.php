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
        Schema::create('delivery_order', function (Blueprint $table) {
            $table->id('deliveryOrderID');
            $table->bigInteger('SO')->unsigned();
            $table->bigInteger('invoiceIDs')->unsigned();
            $table->bigInteger('forwarderID')->unsigned();
            $table->timestamps();

            $table->foreign('SO')->references('salesOrderID')->on('sales_order');
            $table->foreign('invoiceIDs')->references('invoiceID')->on('sales_invoices');
            $table->foreign('forwarderID')->references('forwaderID')->on('forwarder');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_order');
    }
};
