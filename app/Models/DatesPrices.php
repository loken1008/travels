<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatesPrices extends Model
{
    use HasFactory;
    protected $fillable=['tour_id','start_date','end_date','seats_available','price'];
    public function tour(){
        return $this->belongsTo(Tour::class,'tour_id');
    }
}
