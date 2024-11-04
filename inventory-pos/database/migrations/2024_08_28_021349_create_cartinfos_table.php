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
        Schema::create('cartinfos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_id');
            $table->string('reference')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('tax')->nullable();
            $table->string('tax_amount')->nullable();
            $table->string('discount')->nullable();
            $table->string('discount_amount')->nullable();
            $table->string('due')->nullable();
            $table->string('total')->nullable();
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartinfos');
    }
};
