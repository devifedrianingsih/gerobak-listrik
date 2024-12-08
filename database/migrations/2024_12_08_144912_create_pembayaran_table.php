<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pembayaran', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nama Lengkap
        $table->text('manual_address')->nullable(); // Alamat Manual
        $table->string('city'); // Kota
        $table->string('postal'); // Kode Pos
        $table->string('phone'); // Nomor Telepon
        $table->string('payment_method'); // Metode Pembayaran
        $table->string('pickup_delivery'); // Metode Pengambilan Barang
        $table->string('total'); // Total Harga
        $table->string('upload_bukti')->nullable(); // Bukti Transfer
        $table->timestamps(); // Timestamps
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
