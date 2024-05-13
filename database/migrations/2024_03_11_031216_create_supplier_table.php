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
        Schema::create('supplier', function (Blueprint $table) {
            $table->id('supplierID');
            $table->string('supplierIDs')->unique();
            $table->string('code');
            $table->string('supplierName');
            $table->string('alamat');
            $table->string('contact');
            $table->string('telepon');
            $table->string('teleponHP');
            $table->string('teleponFax');
            $table->string('telepon2')->nullable();
            $table->string('teleponHP2')->nullable();
            $table->string('teleponFax2')->nullable();
            $table->string('telepon3')->nullable();
            $table->string('teleponHP3')->nullable();
            $table->string('teleponFax3')->nullable();
            $table->string('email');
            $table->string('kategori');
            $table->string('status');
            $table->string('bayarPer');
            $table->string('npwp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier');
    }
};
