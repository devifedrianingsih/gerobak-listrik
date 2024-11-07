<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('CustomerID'); // Primary key dengan auto increment
            $table->string('CustomerName', 255); // Nama customer dengan VARCHAR(255)
            $table->string('CustomerEmail', 255)->unique(); // Email customer dengan VARCHAR(255), unik
            $table->string('CustomerPhone', 20)->nullable(); // Nomor telepon dengan VARCHAR(20), opsional
            $table->text('CustomerAddress')->nullable(); // Alamat customer, opsional
            $table->text('ProfileDetails')->nullable(); // Detail profil customer, opsional
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
