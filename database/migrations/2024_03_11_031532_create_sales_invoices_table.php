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
        Schema::create('sales_invoices', function (Blueprint $table) {
            $table->id('invoiceID');
            $table->bigInteger('SO')->unsigned();
            $table->string('invoiceNo');
            $table->date('InvoiceDate');
            $table->string('status');
            $table->timestamps();

            $table->foreign('SO')->references('salesOrderID')->on('sales_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_invoices');
    }
};
