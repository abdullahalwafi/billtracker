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
        Schema::create('orders_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('orders_id');
            $table->unsignedInteger('products_id');
            $table->timestamps();

            $table->foreign('orders_id')->references('id')->on('orders')->onDelete('no action')->onUpdate('no action');
            $table->foreign('products_id')->references('id')->on('products')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_detail');
    }
};
