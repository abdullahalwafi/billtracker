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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice', 45)->unique();
            $table->date('tanggal');
            $table->string('total', 50);
            $table->unsignedInteger('clients_id');
            $table->string('status', 45);
            $table->string('bukti', 45);
            $table->timestamps();

            $table->foreign('clients_id')->references('id')->on('clients')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
