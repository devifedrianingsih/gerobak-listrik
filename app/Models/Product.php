<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Nama tabel dalam database
    protected $table = 'products';

    // Primary key
    protected $primaryKey = 'ProductID';

    // Field yang bisa diisi massal
    protected $fillable = [
        'ProductName',
        'ProductDescription',
        'Price',
        'SellingPrice', // Ditambahkan untuk harga jual
        'Stock',
        'ProductImage', // Ditambahkan untuk menyimpan path gambar
        'CategoryID',
        'status' // Ditambahkan untuk menyimpan status produk (draft/publish)
    ];

    // Mengaktifkan timestamps otomatis
    public $timestamps = true;

    // Relasi ke model Category (Jika CategoryID adalah foreign key ke tabel kategori)
    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryID', 'CategoryID');
    }
}
