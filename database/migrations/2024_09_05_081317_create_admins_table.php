<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id('AdminID'); // Primary key dengan auto increment
            $table->string('Username', 255)->unique(); // Username unik dengan VARCHAR(255)
            $table->string('Password', 255); // Password dengan VARCHAR(255)
            $table->string('Email', 255)->unique(); // Email unik dengan VARCHAR(255)
            $table->text('ProfileInfo')->nullable(); // Informasi profil (opsional)
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
