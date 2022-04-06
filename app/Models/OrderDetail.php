<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    
    protected $primaryKey = 'order_details_id';

    protected $fillable = [
        'product_name',
        'product_price',
        'product_sales_quantity',
    ];
}
