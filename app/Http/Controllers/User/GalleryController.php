<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\PageBanner;

class GalleryController extends Controller
{
    public function __construct()
    {
        $gallerybanner = PageBanner::orderBy('id', 'desc')->where('page_name', 'gallery')->first();
        view()->share('gallerybanner', $gallerybanner);
    }
    public function allGallery()
    {
        $allgallery=Gallery::orderBy('id','desc')->paginate(12);
        return view('frontend.gallery.allgallery',compact('allgallery'));
    }

    public function GalleryDetails($gallery_title)
    {
        $title=str_replace('-',' ',$gallery_title);
        $gallerydetails=Gallery::where('gallery_title',$title)->first();
        return view('frontend.gallery.gallery',compact('gallerydetails'));
    }
}
