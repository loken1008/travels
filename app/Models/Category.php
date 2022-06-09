<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category_name','category_slug'];

    public function subcategory(){
        return $this->hasMany(SubCategory::class,'category_id','id');
    }
    public function tour(){
        return $this->hasMany(Tour::class,'category_id');
    }
}
