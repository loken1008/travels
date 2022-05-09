<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function allGallery()
    {
        $allgallery=Gallery::orderBy('id','desc')->paginate(12);
        return view('frontend.gallery.allgallery',compact('allgallery'));
    }

    public function GalleryDetails($gallery_title)
    {
        $gallerydetails=Gallery::where('gallery_title',$gallery_title)->first();
        return view('frontend.gallery.gallery',compact('gallerydetails'));
    }
}
