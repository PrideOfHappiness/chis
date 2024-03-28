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
        Schema::create('forwarder', function (Blueprint $table) {
            $table->id('forwaderID');
            $table->string('code');
            $table->string('forwaderName');
            $table->text('alamat');
            $table->string('city');
            $table->string('contact');
            $table->string('telepon');
            $table->string('teleponHP');
            $table->string('email');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forwarder');
    }
};
