<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan (opsional jika nama tabel sesuai konvensi Laravel)
    protected $table = 'orders';

    // Menentukan primary key
    protected $primaryKey = 'OrderID';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'CustomerID',
        'CustomerName',
        'OrderDate',
        'OrderStatus',
        'PaymentStatus',
        'PaymentType',
        'TotalAmount',
        'InvoiceID'
    ];

    // Relasi ke model Customer (setiap order terkait dengan satu customer)
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CustomerID', 'CustomerID');
    }

    // Relasi ke model Invoice (satu order mungkin memiliki satu invoice)
    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'InvoiceID', 'InvoiceID');
    }
}
