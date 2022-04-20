<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'galary';
    public $timestamps = false; 
    protected $fillable = ['name', 'image', 'product_id'];
    protected $primaryKey = 'id';
}
