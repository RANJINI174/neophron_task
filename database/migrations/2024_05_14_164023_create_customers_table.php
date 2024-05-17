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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("customer_name");
            $table->unsignedBigInteger('groups_id')->nullable();
            $table->foreign('groups_id')->references('id')->on('groups');
            $table->string("mobile_no");
            $table->string("email");
            $table->string("gst_no");
            $table->string("billing_address");
            $table->string("shipping_address");
            $table->string("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('customers');
        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign(['groups_id']);
            $table->dropColumn('groups_id');
        });
    }
};
