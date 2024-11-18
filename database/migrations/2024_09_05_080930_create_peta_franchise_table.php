<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetaFranchiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('peta_franchise', function (Blueprint $table) {
    //         $table->id(); // ID untuk peta_franchise
    //         $table->unsignedBigInteger('id_mitra'); // Relasi ke mitra
    //         $table->string('nama_mitra');
    //         $table->string('alamat_mitra');
    //         $table->decimal('latitude', 10, 7); // Latitude dengan 7 angka desimal
    //         $table->decimal('longitude', 10, 7); // Longitude dengan 7 angka desimal
    //         $table->timestamps();

    //         // Definisikan relasi dengan mitra
    //         $table->foreign('id_mitra')->references('id_mitra')->on('mitra')->onDelete('cascade');
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  *
    //  * @return void
    //  */
    // public function down()
    // {
    //     Schema::dropIfExists('peta_franchise');
    // }
}
