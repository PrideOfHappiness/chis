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
        Schema::create('purchase_request_approval', function (Blueprint $table) {
            $table->id('purchaseRequestApprovalID');
            $table->bigInteger('purchaseRequestIDs')->unsigned();
            $table->string('approvalID');
            $table->timestamps();

            $table->foreign('purchaseRequestIDs')->references('purchaseRequestID')->on('purchase_request');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_request_approval');
    }
};
