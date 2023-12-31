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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->float('amount')->default(0);
            $table->enum('type', ['income', 'expense']);
            $table->enum('category', ['wage', 'bonus', 'gift', 'food & drinks', 'shopping', 'charity', 'housing', 'insurance', 'taxes', 'transportation', 'uncategorized'])->default('uncategorized');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
