<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('ProductID');
            $table->string('ProductName');
            $table->text('ProductDescription')->nullable();
            $table->float('Price')->nullable();
            $table->integer('Stock')->nullable();
            $table->float('ProductRating')->nullable();
            $table->unsignedBigInteger('CategoryID')->nullable();
            $table->foreign('CategoryID')->references('CategoryID')->on('categories')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
