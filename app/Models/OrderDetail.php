<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    public $timestamps = false; 
    protected $fillable = [
        'order_code', 'product_id', 'product_name','product_price','product_sales_quantity','product_coupon','product_feeship'
    ];
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
