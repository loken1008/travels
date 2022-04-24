<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
}
