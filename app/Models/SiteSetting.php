<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
    protected $fillable = ['logo','footer_logo','copy_right', 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'google', 'pinterest'];
}
