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
        Schema::table('carts', function (Blueprint $table) {
            // Adding size and color columns to the carts table
            $table->string('size')->nullable()->after('product_id'); // Assuming product_id is the last column
            $table->string('color')->nullable()->after('size'); // Adding color after size
            // You can also add any other necessary constraints or defaults if needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            // Dropping size and color columns from the carts table
            $table->dropColumn(['size', 'color']);
        });
    }
};
