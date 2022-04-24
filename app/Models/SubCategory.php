<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable=['category_id','sub_category_name','sub_category_slug',];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function tour()
    {
        return $this->hasMany(Tour::class,'subcategory_id','id');
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
    public function images()
    {
        return $this->hasMany(Images::class,'tour_id');
    }
 
}
