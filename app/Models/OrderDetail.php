<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $primaryKey = 'OrderDetailID';

    protected $fillable = [
        'OrderID',
        'ProductID',
        'ProductName',
        'Category',
        'Quantity',
        'Price',
        'CustomerName',
        'CustomerEmail',
        'CustomerPhone',
        'ShippingDate',
        'ShippingAddress',
        'ShippingStatus',
        'TotalAmount'
    ];

    public $timestamps = true;

    // Relasi ke Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'OrderID', 'OrderID');
    }

    // Relasi ke Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID', 'ProductID');
    }
}
