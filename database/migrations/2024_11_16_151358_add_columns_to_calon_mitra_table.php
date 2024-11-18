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
        Schema::table('calon_mitra', function (Blueprint $table) {
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('domisili');
            $table->string('provinsi');
            $table->string('kode_pos');
            $table->string('negara');
            $table->string('latitude');
            $table->string('longitude');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calon_mitra', function (Blueprint $table) {
            //
        });
    }
};
