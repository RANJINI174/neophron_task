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
        Schema::create('sale_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_id')->nullable();
                    $table->foreign('sale_id')->references('id')->on('sales');
                     $table->unsignedBigInteger('item_id')->nullable();
                     $table->foreign('item_id')->references('id')->on('sports');
                    // $table->string('item_id');
                    $table->string('quantity',50);
                    $table->string('unit_price',40);
                    // $table->string('tax',40);
                    $table->string('total_price',30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_items');
    }
};
