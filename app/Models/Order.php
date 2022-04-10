<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OrderDetail;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    public $timestamps = false; 
    protected $fillable = ['order_total', 'order_status'];
    protected $primaryKey = 'order_id';
    public function orderDetail(){
        return $this->hasOne(OrderDetail::class,'order_id');
    }

}
