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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 50)->unique();
            $table->string('nama', 45);
            $table->string('harga_beli', 45);
            $table->string('harga_jual', 45);
            $table->integer('stok');
            $table->text('deskripsi')->nullable();
            $table->unsignedInteger('categories_id');
            $table->timestamps();

            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
