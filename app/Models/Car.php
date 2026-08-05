<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['name', 'brand', 'price_per_day', 'image', 'is_available'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
