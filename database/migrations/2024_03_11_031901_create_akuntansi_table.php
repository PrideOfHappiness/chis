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
        Schema::create('akuntansi', function (Blueprint $table) {
            $table->id();
            $table->string('akunID', 20)->unique();
            $table->string('kodeID_debet', 4);
            $table->string('kodeID_kredit', 4);
            $table->string('deskripsi');
            $table->integer('jumlah_debet');
            $table->integer('jumlah_kredit');
            $table->bigInteger('user_input')->unsigned();
            $table->bigInteger('user_ubah')->unsigned()->nullable();
            $table->string('token_ubah_data_akun', 20)->nullable();
            $table->timestamps();

            $table->foreign('kodeID_debet')->references('kode_akun')->on('kode_akun');
            $table->foreign('kodeID_kredit')->references('kode_akun')->on('kode_akun');
            $table->foreign('user_input')->references('userIDNo')->on('users');
            $table->foreign('user_ubah')->references('userIDNo')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akuntansi');
    }
};
