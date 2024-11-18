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
        'no_hp_mitra', 'status'
    ];

    public function petaFranchise()
    {
        return $this->hasOne(PetaFranchise::class, 'id_mitra', 'id_mitra');
    }

    public $timestamps = true;

    
}
