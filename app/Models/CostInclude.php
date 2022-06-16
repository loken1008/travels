<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostInclude extends Model
{
    use HasFactory;
    protected $fillable = ['travel_id', 'cost_include'];
}
