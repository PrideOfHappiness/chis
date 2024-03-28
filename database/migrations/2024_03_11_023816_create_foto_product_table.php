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
        Schema::create('foto_product', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('productID')->unsigned();
            $table->string('namaFile');
            $table->timestamps();

            $table->foreign('productID')->references('productID')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto_product');
    }
};
