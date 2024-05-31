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
        Schema::table('sale_items', function (Blueprint $table) {
            // Drop the foreign key constraint first if it exists
            $table->dropForeign(['tax_id']);

            // Drop the column
            $table->dropColumn('tax_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sale_items', function (Blueprint $table) {
            // Re-add the column
            $table->unsignedBigInteger('tax_id')->nullable();

            // Re-add the foreign key constraint
            $table->foreign('tax_id')->references('id')->on('tax_details');
        });
    }
};
