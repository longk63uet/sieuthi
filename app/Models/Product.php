<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    public $timestamps = false;

    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_name',
        'product_detail',
        'product_image',
        'product_status',
        'product_content',
        'product_quantity',
    ];
}
