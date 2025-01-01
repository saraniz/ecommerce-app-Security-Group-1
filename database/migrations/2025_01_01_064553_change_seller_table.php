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
        Schema::table('seller', function (Blueprint $table) {
            $table->float('ratings')->default(0)->change();
            $table->string('description')->change();
            $table->dateTime('joined_date')->default(now())->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('seller', function (Blueprint $table) {
            $table->dropColumn('ratings');
            $table->dropColumn('description');
            $table->dropColumn('joined_date');
        }); 
    }
};
