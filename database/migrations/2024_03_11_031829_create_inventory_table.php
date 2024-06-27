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
        Schema::create('inventory', function (Blueprint $table) {
            $table->id('inventoryID');
            $table->bigInteger('productIDs')->unsigned();
            $table->enum('adjustment_code', ['IN', 'OUT']);
            $table->integer('productQuantity_adjustments');
            $table->string('satuan_adjustmets', 5);
            $table->bigInteger('userID_adjustment')->unsigned();
            $table->text('keterangan_return');
            $table->date('adjustment_created');
            $table->timestamps();

            $table->foreign('productIDs')->references('productID')->on('product');
            $table->foreign('userID_adjustment')->references('userIDNo')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
