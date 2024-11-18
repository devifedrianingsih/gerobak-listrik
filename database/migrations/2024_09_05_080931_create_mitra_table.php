<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitraTable extends Migration
{
    public function up()
    {
        Schema::create('mitra', function (Blueprint $table) {
            $table->string('id_mitra')->primary();  // Gunakan string sebagai primary key
            $table->string('nama_mitra');
            $table->string('alamat_mitra');
            $table->string('email_mitra');
            $table->string('no_hp_mitra');
            $table->enum('kategori', ['mitra', 'non-mitra']);
            $table->enum('status', ['aktif', 'tidak aktif']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mitra');
    }
}