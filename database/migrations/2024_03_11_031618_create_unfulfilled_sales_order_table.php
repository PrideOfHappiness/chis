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
        Schema::create('unfulfilled_sales_order', function (Blueprint $table) {
            $table->id('unfulfilledID');
            $table->bigInteger('SO')->unsigned();
            $table->integer('version');
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
        Schema::dropIfExists('unfulfilled_sales_order');
    }
};
