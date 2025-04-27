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
        Schema::create('purchases', function (Blueprint $table) {
            $table->foreignId('supplier_id')->constrained()->onDelete('cascade');
            $table->foreignId('raw_material_id')->constrained()->onDelete('cascade');
            $table->decimal('quantity', 8, 2);
            $table->decimal('purchase_price', 8, 2);
            $table->timestamp('purchase_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
