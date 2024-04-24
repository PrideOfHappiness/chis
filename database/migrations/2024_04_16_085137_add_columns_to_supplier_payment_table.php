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
        Schema::table('supplier_payment', function (Blueprint $table) {
            $table->string('payment_type');
            $table->string('bank_noRek');
            $table->string('payment_reference');
            $table->text('notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('supplier_payment', function (Blueprint $table) {
            //
        });
    }
};
