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
        Schema::create('purchase_order_approval', function (Blueprint $table) {
            $table->id('purchaseOrderApprovalID');
            $table->bigInteger('purchaseOrderIDs')->unsigned();
            $table->string('approvalID');
            $table->timestamps();

            $table->foreign('purchaseOrderIDs')->references('purchaseOrderID')->on('purchase_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_approval');
    }
};
