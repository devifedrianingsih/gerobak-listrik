<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitrasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('mitras', function (Blueprint $table) {
            $table->id();
            $table->string('nomor')->unique();
            $table->string('nama');
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('berkas')->nullable(); // Untuk menyimpan file berkas mitra
            $table->enum('status', ['terima', 'tolak', 'belum_diproses'])->default('belum_diproses');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::table('mitras', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
    
}
