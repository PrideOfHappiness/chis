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
            $table->string('code');
            $table->string('part_no', 50);
            $table->string('productName');
            $table->bigInteger('vehicleType')->unsigned();
            $table->bigInteger('productCategory')->unsigned();
            $table->string('status');
            $table->integer('min_stock');
            $table->integer('stock')->nullable();
            $table->string('satuan');
            $table->integer('harga_beli');
            $table->integer('hpp')->nullable();
            $table->integer('harga_jual');
            $table->text('notes')->nullable();
            $table->string('sub_categoryProduct')->nullable();
            $table->timestamps();

            $table->foreign('vehicleType')->references('vehicleTypeID')->on('vehicle_type');
            $table->foreign('productCategory')->references('productCategoryID')->on('product_category');
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
