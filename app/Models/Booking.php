<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Booking extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'bookings';
    protected $fillable = [
        'customer_id', 'tour_id', 'first_name', 'last_name', 'email', 'address', 'post_code', 'telephone', 'mobile', 'country', 'number_people', 'arrival_date', 'departure_date', 'message',
    ];
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
