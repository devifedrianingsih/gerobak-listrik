<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('mitra', function (Blueprint $table) {
            $table->string('kode_mitra')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('mitra', function (Blueprint $table) {
            $table->string('kode_mitra')->nullable(false)->change();
        });
    }
};
