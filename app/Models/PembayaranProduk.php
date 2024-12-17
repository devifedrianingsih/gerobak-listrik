<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranProduk extends Model
{
    use HasFactory;

    protected $table = 'pembayaran_produk';

    protected $fillable = [
        'pembayaran_id',
        'nama_produk',
        'harga_produk',
        'kuantitas',
        'total_harga',
    ];

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'pembayaran_id', 'id');
    }
}
