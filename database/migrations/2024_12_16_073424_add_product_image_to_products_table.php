<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductImageToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('ProductImage');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('ProductImage');
        });
    }
}
