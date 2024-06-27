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
        Schema::create('inventory_return', function (Blueprint $table) {
            $table->id('inventory_returnID');
            $table->bigInteger('productIDs')->unsigned();
            $table->enum('return_code', ['IN', 'OUT']);
            $table->integer('productQuantity_return');
            $table->string('satuan_return', 5);
            $table->bigInteger('customerIDs')->nullble()->unsigned();
            $table->bigInteger('supplierIDs')->nullble()->unsigned();
            $table->bigInteger('userID_return')->unsigned();
            $table->text('keterangan_return');
            $table->date('return_created');
            $table->integer('harga_retur');
            $table->integer('biaya_tambahan');
            $table->timestamps();

            $table->foreign('productIDs')->references('productID')->on('product');
            $table->foreign('supplierIDs')->references('supplierID')->on('supplier');
            $table->foreign('customerIDs')->references('customerID')->on('customer');
            $table->foreign('userID_return')->references('userIDNo')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_return');
    }
};
