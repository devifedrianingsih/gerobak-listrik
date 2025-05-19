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
        'kode_mitra', // ← ini WAJIB masuk fillable
        'total',
        'pickup_method',
        'status',
        'tanggal',
        'payment_id',
    ];

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'payment_id');
    }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'kode_mitra', 'kode_mitra');
    }

    public function produkPembayaran()
    {
        return $this->hasMany(PembayaranProduk::class, 'pembayaran_id', 'id');
    }
}
