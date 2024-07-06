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
        Schema::create('product', function (Blueprint $table) {
            $table->id('productID');
            $table->bigInteger('brand')->unsigned() ;
            $table->string('code');
            $table->string('part_no', 50);
            $table->string('productName');
            $table->bigInteger('vehicleType')->unsigned();
            $table->bigInteger('productCategory')->unsigned();
            $table->bigInteger('subCategory')->unsigned();
            $table->string('status');
            $table->integer('min_stock');
            $table->integer('stock')->nullable();
            $table->string('satuan');
            $table->integer('harga_beli');
            $table->integer('hpp')->nullable();
            $table->integer('harga_jual');
            $table->text('notes')->nullable();
            $table->bigInteger('warehouseID')->unsigned();
            $table->timestamps();

            $table->foreign('brand')->references('brandID')->on('brand');
            $table->foreign('vehicleType')->references('vehicleTypeID')->on('vehicle_type');
            $table->foreign('productCategory')->references('productCategoryID')->on('product_category');
            $table->foreign('subCategory')->references('subCategoryListID')->on('sub_categories');
            $table->foreign('warehouseID')->references('warehouseID')->on('warehouse');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
