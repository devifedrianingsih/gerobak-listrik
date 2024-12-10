<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran'; // Nama tabel

    protected $fillable = [
        'name',
        'manual_address',
        'city',
        'postal',
        'phone',
        'payment_method',
        'pickup_delivery',
        'total',
        'upload_bukti',
        'status',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'payment_id', 'id');
    }
}