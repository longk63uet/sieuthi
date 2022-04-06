<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
    	'coupon_name', 'coupon_code', 'coupon_quantity','coupon_number', 'coupon_time'
    ];
    protected $primaryKey = 'cid';
 	protected $table = 'coupon';
}
