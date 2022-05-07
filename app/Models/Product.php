<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $fillable = [
    	'product_name', 'category_id','product_detail','product_quantity','product_price','product_image','product_status', 'view', 'sold'
    ];
    protected $primaryKey = 'product_id';
 	protected $table = 'product';
}
