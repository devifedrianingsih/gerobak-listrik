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
            $table->id();
            $table->string('order_id')->unique(); // ID Pesanan
            $table->string('name'); // Nama
            $table->enum('category', ['mitra', 'non mitra']); // Kategori
            $table->decimal('total'); // Harga
            $table->enum('pickup_method', ['delivery', 'pickup']); // Metode Pengambilan
            $table->enum('status', ['menunggu', 'sudah diambil'])->default('menunggu');
            $table->timestamps(); // Tanggal
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
