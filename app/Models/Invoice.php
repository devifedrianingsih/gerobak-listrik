<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan (opsional jika nama tabel sesuai konvensi Laravel)
    protected $table = 'invoices';

    // Menentukan primary key
    protected $primaryKey = 'InvoiceID';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'OrderID',
        'InvoiceDate',
        'TotalAmount'
    ];

    // Relasi ke model Order (satu invoice mungkin hanya terkait dengan satu order)
    public function order()
    {
        return $this->belongsTo(Order::class, 'OrderID', 'OrderID');
    }
}
