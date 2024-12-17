<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('ProductName');
            $table->text('ProductDescription');
            $table->decimal('Price', 10, 2);
            $table->decimal('SellingPrice', 10, 2)->nullable();
            $table->integer('Stock');
            $table->unsignedBigInteger('CategoryID');
            $table->string('ProductImage')->nullable();
            $table->timestamps();

            $table->foreign('CategoryID')->references('id')->on('categories');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}