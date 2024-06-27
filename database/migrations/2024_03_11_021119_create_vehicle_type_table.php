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
        Schema::create('vehicle_type', function (Blueprint $table) {
            $table->id('vehicleTypeID');
            $table->bigInteger('nama')->unsigned();
            $table->string('vehicle_type')->nullable();
            $table->timestamps();

            $table->foreign('nama')->references('merkID')->on('merk_kendaraan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_type');
    }
};
