<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pembayaran_produk', function (Blueprint $table) {
            $table->decimal('total_harga', 15, 2)->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('pembayaran_produk', function (Blueprint $table) {
            $table->decimal('total_harga', 15, 2)->nullable(false)->change();
        });
    }
};
