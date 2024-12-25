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
        Schema::create('transaction', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('method');
            $table->decimal('amount');
            $table->decimal('total_price');
            $table->dateTime('transaction_date');
            $table->uuid('buyer_id');
            $table->uuid('seller_id');
            $table->uuid('product_id');
            $table->foreign('buyer_id')->references('id')->on('user')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreign('seller_id')->references('id')->on('seller')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
