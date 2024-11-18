<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetaFranchise extends Model
{
    use HasFactory;

    protected $table = 'peta_franchise';

    protected $fillable = [
        'id_mitra', 'nama_mitra', 'alamat_mitra', 'latitude', 'longitude'
    ];

    // Relasi ke Mitra
    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'id_mitra', 'id_mitra');
    }

    public $timestamps = true;
}
