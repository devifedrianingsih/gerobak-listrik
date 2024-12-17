<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranProdukTable extends Migration
{
    public function up()
    {
        Schema::create('pembayaran_produk', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('pembayaran_id'); // Foreign Key ke tabel pembayaran
            $table->string('nama_produk');
            $table->integer('harga_produk');
            $table->integer('kuantitas');
            $table->integer('total_harga');
            $table->timestamps();

            // Definisi Foreign Key
            $table->foreign('pembayaran_id')->references('id')->on('pembayaran')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran_produk');
    }
}
