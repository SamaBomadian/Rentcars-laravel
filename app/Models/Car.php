<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Car extends Model
{
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
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function getI()
    {
        return $this->hasMany(Booking::class);
    }
    protected function airConditioning(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ($value == 1 || $value === 'Yes') ? 'Yes' : 'No',
        );
    }
}