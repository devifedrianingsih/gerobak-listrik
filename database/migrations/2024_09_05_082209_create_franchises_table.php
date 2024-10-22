<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franchises', function (Blueprint $table) {
            $table->id('FranchiseID'); // Primary key dengan auto increment
            $table->string('Location', 255); // Lokasi franchise
            $table->string('CustomerName', 255); // Nama customer yang terkait
            $table->string('CustomerEmail', 255)->unique(); // Email customer yang terkait harus unik
            $table->string('CustomerPhone', 20)->nullable(); // Nomor telepon customer (opsional)
            $table->string('Status', 50)->nullable(); // Status franchise
            $table->unsignedBigInteger('AdminID'); // Foreign key ke Admin
            $table->timestamps(); // created_at dan updated_at

            // Definisikan foreign key
            $table->foreign('AdminID')->references('AdminID')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('franchises');
    }
}
