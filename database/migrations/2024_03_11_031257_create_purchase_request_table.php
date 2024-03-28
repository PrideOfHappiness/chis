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
        Schema::create('purchase_request', function (Blueprint $table) {
            $table->id('purchaseRequestID');
            $table->string('noPurchaseRequest');
            $table->integer('version');
            $table->date('purchaseRequestDate');
            $table->string('requestor');
            $table->string('status');
            $table->bigInteger('requestorID')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('requestorID')->references('warehouseID')->on('warehouse');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_request');
    }
};
