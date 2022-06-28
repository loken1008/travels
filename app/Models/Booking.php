<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;

class Booking extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'bookings';
    protected $guarded = [];
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
   
}
