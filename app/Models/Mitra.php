<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    protected $table = 'mitras'; // Pastikan nama tabel benar
    protected $fillable = [
        'nomor', 'nama', 'no_hp', 'alamat', 'berkas', 'status'
    ];
}


