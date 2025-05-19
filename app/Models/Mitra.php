<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $table = 'mitra';
    protected $guarded = [];
    
    public function orders()
    {
        return $this->hasMany(Order::class, 'kode_mitra', 'kode_mitra');
    }
}
