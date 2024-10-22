<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesReport extends Model
{
    use HasFactory;

    protected $table = 'sales_reports';

    protected $primaryKey = 'ReportID';

    protected $fillable = [
        'ReportDate',
        'TotalSales',
        'AdminID'
    ];

    public $timestamps = true;

    // Relasi ke Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'AdminID', 'AdminID');
    }
}
