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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('Product_name');
            $table->string('unit')->nullable();
            $table->string('purchase_price')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('warehouse')->nullable();
            $table->string('storage_spot')->nullable();
            $table->string('min_qty')->nullable();
            $table->string('qty')->nullable();
            $table->string('reorder_lavel')->nullable();
            $table->string('description')->nullable();
            $table->string('supplier')->nullable();
            $table->string('status')->nullable();
            $table->string('photo')->nullable();
            $table->string('sku')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
