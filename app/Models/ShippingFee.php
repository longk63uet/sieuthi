<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingFee extends Model
{
    use HasFactory;
    protected $table = 'shipping_fee';
    public $timestamps = false; 
    protected $fillable = [
        'matp',
        'maqh',
        'xaid',
        'shpping_fee'
    ];
}
