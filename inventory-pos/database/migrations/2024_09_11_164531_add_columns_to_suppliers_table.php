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
        Schema::table('suppliers', function (Blueprint $table) {
            $table->decimal('total_purchase_amount', 15, 2)->default(0)->after('routing_no');
            $table->decimal('total_due', 15, 2)->default(0)->after('total_purchase_amount');
            $table->string('total_paid')->nullable()->after('total_due');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suppliers', function (Blueprint $table) {
            //
        });
    }
};
