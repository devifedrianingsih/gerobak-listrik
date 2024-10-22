<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan (opsional jika nama tabel sesuai konvensi Laravel)
    protected $table = 'customers';

    // Menentukan primary key
    protected $primaryKey = 'CustomerID';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'CustomerName',
        'CustomerEmail',
        'CustomerPhone',
        'CustomerAddress',
        'ProfileDetails'
    ];

    // Jika ada relasi ke tabel lain, misalnya relasi ke `Order`
    public function orders()
    {
        return $this->hasMany(Order::class, 'CustomerID', 'CustomerID');
    }
}
