<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = ['country_id','tour_id', 'hotel_name', 'hotel_address', 'hotel_phone', 'hotel_description', 'map_link', 'image', 'status'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
