<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['brand', 'model','price_per_day', 'image','is_available','passengers','doors','transmission','air_conditioning'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
