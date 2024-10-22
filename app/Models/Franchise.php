<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan (opsional jika nama tabel sesuai konvensi Laravel)
    protected $table = 'franchises';

    // Menentukan primary key
    protected $primaryKey = 'FranchiseID';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'Location',
        'CustomerName',
        'CustomerEmail',
        'CustomerPhone',
        'Status',
        'AdminID'
    ];

    // Relasi ke model Admin (satu franchise dikelola oleh satu admin)
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'AdminID', 'AdminID');
    }
}
