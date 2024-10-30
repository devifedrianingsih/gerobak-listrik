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
        Schema::table('mitras', function (Blueprint $table) {
            $table->enum('status', ['terima', 'tolak', 'belum_diproses'])->default('belum_diproses');
        });
    }
    
    public function down()
    {
        Schema::table('mitras', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
    
}
