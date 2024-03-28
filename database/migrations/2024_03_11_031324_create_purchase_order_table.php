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
        Schema::create('purchase_order', function (Blueprint $table) {
            $table->id('purchaseOrderID');
            $table->string('purchaseOrderNo')->unique();
            $table->integer('version');
            $table->date('PODate');
            $table->bigInteger('supplier')->unsigned();
            $table->string('status');
            $table->timestamps();

            $table->foreign('supplier')->references('supplierID')->on('supplier');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order');
    }
};
