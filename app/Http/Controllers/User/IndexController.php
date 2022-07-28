<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Country;
use App\Models\Banner;
use App\Models\Coupon;
use App\Models\Blog;
use App\Models\ChooseUs;
use App\Models\Gallery;
use App\Models\PageBanner;
use App\Models\Category;
use App\Models\HomePage;
use Carbon\Carbon;

class IndexController extends Controller
{

    public function __construct()
    {
        $tourbanner = PageBanner::orderBy('id', 'desc')->where('page_name', 'tour')->first();
        view()->share('tourbanner', $tourbanner);
    }
    public function homePage()
    {
        $getcountry=Country::with('tours')->orderBy('id','asc')->where('status','=','1')->get();
        $getTour=Tour::with('country','place','category')->where(['status'=>'1','is_best_selling'=>'1'])->orderByRaw('RAND()')->get();
        $cattrekking=Category::with('tour')->where('category_type','trekking')->first();
        $catnature=Category::with('tour')->where('category_type','natural')->first();
        $catadventure=Category::with('tour')->where('category_type','adventure')->first();
        $catpeak=Category::with('tour')->where('category_type','peakclimbing')->first();
        $getbanner=Banner::orderBy('id','desc')->where('status','=','1')->get();
        $getblogs=Blog::orderBy('id','desc')->where('status','=','1')->limit(3)->get();
        $chooseus=ChooseUs::orderBy('id','asc')->limit(3)->get();
        $gallery=Gallery::orderBy('id','desc')->limit(8)->get();
        $homepagebannerone=PageBanner::orderBy('id','desc')->where('page_name','homepageone')->first();
        $homepagebannertwo=PageBanner::orderBy('id','desc')->where('page_name','homepagetwo')->first();
        $homepagebannerthree=PageBanner::orderBy('id','desc')->where('page_name','homepagethree')->first();
        $homepage=HomePage::orderBy('id','desc')->first();
        return view('frontend.index',compact('getTour','getcountry','getbanner','getblogs','chooseus','gallery','homepagebannerone','homepagebannertwo','homepagebannerthree','cattrekking','catadventure','catnature','catpeak','homepage'));
    }

    public function  tourDetails($slug)
    {
        
        $getTourdetails=Tour::with('country','place','category','dateprice','equipment','itinerary','images','fqa','blog')->where('status','1')->where('slug',$slug)->first();
         $getTour=Tour::with('country','place','category')->orderBy('id','desc')->where('status','=','1')->where('slug','!=',$slug)->where('category_id',$getTourdetails->category_id)->limit(9)->get();
        return view('frontend.tour.tourdetails',compact('getTourdetails','getTour'));
    }
    public function tourMap($slug)
    { 
        $gettourmap=Tour::where('slug',$slug)->first();
        return view('frontend.tour.map',compact('gettourmap'));
    }

}
