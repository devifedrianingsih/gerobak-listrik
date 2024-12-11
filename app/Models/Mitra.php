<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $table = 'mitra';

    protected $fillable = [
        'id_mitra', 'nama_mitra', 'alamat_mitra', 'email_mitra', 
        'no_hp_mitra', 'status', 'nomor' // Tambahkan kolom 'nomor' jika diperlukan
    ];

    public function calonMitra()
    {
        return $this->belongsTo(CalonMitra::class, 'nomor', 'nomor'); // Relasi dengan tabel calon_mitra
    }
}