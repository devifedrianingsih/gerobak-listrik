<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalonMitraTable extends Migration
{
    public function up()
    {
        Schema::create('calon_mitra', function (Blueprint $table) {
            $table->id('nomor'); // Jika menggunakan ID auto increment
            $table->string('nama_calon_mitra');
            $table->string('email_calon_mitra');
            $table->string('no_hp_calon_mitra');
            $table->string('kota_calon_mitra');
            $table->string('alamat_calon_mitra');
            $table->enum('status', ['belum diproses', 'diterima', 'ditolak'])->default('belum diproses');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calon_mitra');
    }
}

