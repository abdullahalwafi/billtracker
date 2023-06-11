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
        Schema::create('imgproducts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img', 200);
            $table->unsignedInteger('products_id');
            $table->timestamps();

            $table->foreign('products_id')->references('id')->on('products')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imgproducts');
    }
};
