<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $fillable=['tour_id','equipment_name','equipment_description'];
    public function tour(){
        return $this->belongsTo(Tour::class,'tour_id');
    }
}
