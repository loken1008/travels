<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $fillable=['tour_id','images'];
    public function tour(){
        return $this->belongsTo(Tour::class,'tour_id');
    }
    // protected $casts = [
    //     'images' => 'array',
    // ];
}
