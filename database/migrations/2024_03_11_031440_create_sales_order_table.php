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
        Schema::create('sales_order', function (Blueprint $table) {
            $table->id('salesOrderID');
            $table->string('salesOrderIDs')->unique();
            $table->date('SODateCreated');
            $table->bigInteger('customers')->unsigned();
            $table->integer('total');
            $table->timestamps();

            $table->foreign('customers')->references('customerID')->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_order');
    }
};
