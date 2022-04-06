<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    public $timestamps = false;

    protected $primaryKey= 'matp';

    protected $fillable = [
        'name',
        'slug',
        'type',
    ];
}
