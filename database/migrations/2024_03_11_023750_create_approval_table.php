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
        Schema::create('approval', function (Blueprint $table) {
            $table->id('approvalID');
            $table->string('approval');
            $table->bigInteger('userID')->unsigned();
            $table->integer('sequence');
            $table->string('jabatan');
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
        Schema::dropIfExists('approval');
    }
};
