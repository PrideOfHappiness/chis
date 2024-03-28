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
        Schema::create('users', function (Blueprint $table) {
            $table->id('userIDNo');
            $table->string('code');
            $table->string('userName')->unique();
            $table->string('nama');
            $table->string('perusahaan');
            $table->string('branch')->nullable();
            $table->string('department')->nullable();
            $table->bigInteger('user_access')->unsigned();;
            $table->enum('status', ['Active', 'Inactive']);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_access')->references('id')->on('user_access');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
