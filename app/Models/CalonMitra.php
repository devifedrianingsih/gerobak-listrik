<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonMitra extends Model
{
    use HasFactory;

    protected $primaryKey = 'nomor'; // Gunakan kolom 'nomor' sebagai primary key
    public $incrementing = false;    // Jika 'nomor' bukan auto-increment
    protected $keyType = 'string';   // Tipe data sesuai dengan database
    protected $table = 'calon_mitra';

    protected $fillable = [
        'nama_calon_mitra',        
        'email_calon_mitra',        
        'no_hp_calon_mitra',        
        'kota_calon_mitra',        
        'alamat_calon_mitra',        
        'status',        
        'tanggal_lahir',        
        'jenis_kelamin',        
        'domisili',        
        'provinsi',        
        'kode_pos',        
        'negara',        
        'latitude',        
        'longitude',        
    ];

    public $timestamps = true;

    public function mitra()
    {
        return $this->hasOne(Mitra::class, 'nomor', 'nomor'); // Relasi dengan tabel mitra
    }
}
