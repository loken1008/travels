<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'tour_id', 'fullname', 'email', 'address', 'post_code', 'telephone', 'mobile', 'country', 'number_people', 'arrival_date', 'departure_date', 'message',
    ];
}
