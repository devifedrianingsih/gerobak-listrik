<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan (opsional jika nama tabel sesuai dengan konvensi)
    protected $table = 'admins';

    // Menentukan primary key
    protected $primaryKey = 'AdminID';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'Username',
        'Password',
        'Email',
        'ProfileInfo'
    ];

    // Jika ada relasi ke model lain, misalnya relasi ke `SalesReport`:
    public function salesReports()
    {
        return $this->hasMany(SalesReport::class, 'AdminID', 'AdminID');
    }

    // Jika ada relasi ke `Article`
    public function articles()
    {
        return $this->hasMany(Article::class, 'AuthorID', 'AdminID');
    }
}
