<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function tours()
    {
        return $this->hasMany(Tour::class, 'country_id', 'id');
    }
    public function place()
    {
        return $this->hasMany(Place::class);
    }
}
