<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FQA extends Model
{
    use HasFactory;
    protected $fillable = ['tour_id', 'question', 'answer', 'status']; 

    public function tour()
    {
        return $this->belongsTo('App\Models\Tour','tour_id');
    }
}
