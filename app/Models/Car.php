<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'price_per_day',
        'image',
        'passengers',
        'transmission',
        'doors',
        'air_conditioning',
        'status',
    ];
}