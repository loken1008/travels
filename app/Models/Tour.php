<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded=[];

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
    public function place()
    {
        return $this->belongsTo(Place::class,'place_id');
    }

    public function dateprice()
    {
        return $this->hasMany(DatesPrices::class,'tour_id');
    }
    public function equipment()
    {
        return $this->hasMany(Equipment::class,'tour_id');
    }
    public function itinerary()
    {
        return $this->hasMany(Itinerary::class,'tour_id');
    }
    public function fqa()
    {
        return $this->hasMany(FQA::class,'tour_id');
    }
    public function images()
    {
        return $this->hasMany(Images::class,'tour_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'subcategory_id');
    }
 
}
