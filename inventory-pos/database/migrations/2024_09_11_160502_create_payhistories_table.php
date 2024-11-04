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
        Schema::create('payhistories', function (Blueprint $table) {
            $table->id();
            $table->string('suppllier_id');
            $table->string('purchase_id');
            $table->string('invoice_no');
            $table->decimal('pay_amount', 15, 2);
            $table->string('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payhistories');
    }
};
