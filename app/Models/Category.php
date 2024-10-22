<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan (opsional jika tabel mengikuti konvensi Laravel)
    protected $table = 'categories';

    // Menentukan primary key
    protected $primaryKey = 'CategoryID';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'Name'
    ];

    // Relasi ke model Product, jika ada relasi satu kategori memiliki banyak produk
    public function products()
    {
        return $this->hasMany(Product::class, 'CategoryID', 'CategoryID');
    }
}
