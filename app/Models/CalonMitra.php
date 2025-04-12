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
        'nama',
        'no_ktp',
        'tanggal_lahir',
        'email',
        'no_hp',
        'jenis_kelamin',
        'alamat',
        'alamat_ktp',
        'domisili',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'provinsi_mitra',
        'kota_mitra',
        'kecamatan_mitra',
        'kelurahan_mitra',
        'kode_pos',
        'latitude',
        'longitude',
        'upload_ktp',
        'upload_foto',
        'status',
    ];

    public $timestamps = true;

    public function mitra()
    {
        return $this->hasOne(Mitra::class, 'nomor', 'nomor'); // Relasi dengan tabel mitra
    }
}
