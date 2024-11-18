<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('OrderDetailID');
            $table->unsignedBigInteger('OrderID')->nullable();
            $table->unsignedBigInteger('ProductID')->nullable();
            $table->string('ProductName');
            $table->string('Category', 100)->nullable();
            $table->integer('Quantity')->nullable();
            $table->float('Price')->nullable();
            $table->string('nama_mitra')->nullable();
            $table->string('email_mitra')->nullable();
            $table->string('no_hp_mitra', 20)->nullable();
            $table->date('ShippingDate')->nullable();
            $table->text('ShippingAddress')->nullable();
            $table->string('ShippingStatus', 50)->nullable();
            $table->float('TotalAmount')->nullable();
            $table->foreign('OrderID')->references('OrderID')->on('orders')->onDelete('set null');
            $table->foreign('ProductID')->references('ProductID')->on('products')->onDelete('set null');
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
        Schema::dropIfExists('order_details');
    }
}
