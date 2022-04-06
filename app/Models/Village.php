<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;
    protected $table = 'villages';
    public $timestamps = false; 

    protected $primaryKey = 'xaid';
    protected $fillable = [
        'name',
        'type',
        'maqh',
    ];
}
