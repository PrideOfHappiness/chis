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
        Schema::create('sales_order_approval', function (Blueprint $table) {
            $table->id('salesOrderApprovalID');
            $table->bigInteger('salesOrders')->unsigned();
            $table->string('approvalID');
            $table->timestamps();

            $table->foreign('salesOrders')->references('salesOrderID')->on('sales_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_order_approval');
    }
};
