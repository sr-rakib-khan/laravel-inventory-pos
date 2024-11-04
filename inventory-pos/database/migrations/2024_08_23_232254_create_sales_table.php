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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->nullable();
            $table->string('reference')->nullable();
            $table->string('status')->nullable();
            $table->string('payment')->nullable();
            $table->string('total')->nullable();
            $table->string('paid')->nullable();
            $table->string('due')->nullable();
            $table->string('tax')->nullable();
            $table->string('discount')->nullable();
            $table->string('shipping')->nullable();
            $table->string('biller')->nullable();
            $table->string('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
