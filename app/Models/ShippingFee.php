<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\District;
use App\Models\Village;

class ShippingFee extends Model
{
    use HasFactory;
    protected $table = 'shipping_fee';
    public $timestamps = false; 
    protected $fillable = [
    	'matp', 'maqh ','xaid ','shpping_fee'
    ];
    public function city(){
        return $this->belongsTo(City::class, 'matp');
    }
    public function district(){
        return $this->belongsTo(District::class, 'maqh');
    }
    public function village(){
        return $this->belongsTo(Village::class, 'xaid');
    }
}
