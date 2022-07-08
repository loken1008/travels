<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testmonial extends Model
{
    use HasFactory;
    protected $fillable = ['name','message_title','message_description','status','image','rating','type','country'];
}
