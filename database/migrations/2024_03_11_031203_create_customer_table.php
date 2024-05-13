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
        Schema::create('customer', function (Blueprint $table) {
            $table->id('customerID');
            $table->string('customerIDs')->unique();
            $table->string('code');
            $table->string('customerName');
            $table->text('alamat');
            $table->text('deliveryAddress');
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
            $table->string('kota');
            $table->string('area');
            $table->string('status');
            $table->enum('statusPKP', ['Yes', 'No']);
            $table->bigInteger('userIDSales')->unsigned();
            $table->string('bayarPer');
            $table->timestamps();

            $table->foreign('userIDSales')->references('id')->on('salesman');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
