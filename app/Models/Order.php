<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'name',
        'category',
        'total',
        'pickup_method',
        'status',
        'tanggal',
        'payment_id', // Jika menggunakan kolom relasi ke pembayaran
    ];

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'payment_id', 'id');
    }

    public function produkPembayaran()
    {
        return $this->hasMany(PembayaranProduk::class, 'pembayaran_id', 'id');
    }
}