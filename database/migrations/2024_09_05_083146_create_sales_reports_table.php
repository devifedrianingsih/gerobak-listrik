<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_reports', function (Blueprint $table) {
            $table->id('ReportID');
            $table->date('ReportDate')->nullable();
            $table->float('TotalSales')->nullable();
            $table->unsignedBigInteger('AdminID')->nullable(); // Kolom yang digunakan untuk foreign key
            // Pastikan bahwa referensi ke kolom 'id' di tabel 'admins'
            $table->foreign('AdminID')->references('id')->on('admins')->onDelete('set null');
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
        Schema::dropIfExists('sales_reports');
    }
}
