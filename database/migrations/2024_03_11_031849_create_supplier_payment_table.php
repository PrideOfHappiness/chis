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
        Schema::create('supplier_payment', function (Blueprint $table) {
            $table->id('paymentID');
            $table->string('paymentNo');
            $table->date('paymentDate');
            $table->bigInteger('invoiceIDs')->unsigned();
            $table->integer('paymentTotal');
            $table->timestamps();

            $table->foreign('invoiceIDs')->references('invoicesRecievedID')->on('invoices_recieved');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_payment');
    }
};
