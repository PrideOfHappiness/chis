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
        Schema::create('salesman', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userID')->unsigned();
            $table->string('alias', 20)->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('userID')->references('userIDNo')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salesman');
    }
};
