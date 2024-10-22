<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('invoices')) {
            Schema::create('invoices', function (Blueprint $table) {
                $table->id('InvoiceID');
                $table->unsignedBigInteger('OrderID')->nullable();  // Foreign key to orders, nullable in case no order is present
                $table->date('InvoiceDate');                         // Date of the invoice
                $table->float('TotalAmount', 8, 2);                  // Total amount with precision of 8,2
                $table->timestamps();                                // Created_at and Updated_at timestamps
    
                // Foreign key constraint to 'orders' table with 'set null' on delete
                $table->foreign('OrderID')->references('OrderID')->on('orders')->onDelete('set null');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
}
