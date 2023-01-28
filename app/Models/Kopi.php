<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kopi extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name',
        'price',
        'brand',
    ];

}
