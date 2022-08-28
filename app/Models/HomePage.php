<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'main_image',
        'image',
        'img_alt',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
