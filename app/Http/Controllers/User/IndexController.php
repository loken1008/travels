<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Country;
use App\Models\Banner;
use App\Models\Hotel;
use App\Models\Coupon;
use App\Models\Blog;
use App\Models\ChooseUs;
use App\Models\Gallery;
use App\Models\PageBanner;
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
        $getTour=Tour::with('country','place','category')->orderBy('id','desc')->where('status','=','1')->whereRaw('LENGTH(description) > ?', [50])->get();
        $getbanner=Banner::orderBy('id','desc')->where('status','=','1')->get();
        $gethotel=Hotel::orderBy('id','desc')->where('status','=','1')->get();
        $getblogs=Blog::orderBy('id','desc')->where('status','=','1')->limit(3)->get();
        $chooseus=ChooseUs::orderBy('id','asc')->limit(3)->get();
        $gallery=Gallery::orderBy('id','desc')->limit(6)->get();
        $homepagebannerone=PageBanner::orderBy('id','desc')->where('page_name','homepageone')->first();
        $homepagebannertwo=PageBanner::orderBy('id','desc')->where('page_name','homepagetwo')->first();
        $homepagebannerthree=PageBanner::orderBy('id','desc')->where('page_name','homepagethree')->first();

        return view('frontend.index',compact('getTour','getcountry','getbanner','gethotel','getblogs','chooseus','gallery','homepagebannerone','homepagebannertwo','homepagebannerthree'));
    }

    public function  tourDetails($tour_name)
    {
        // dd($tour_name);
        // $title = str_replace(' ',',',$tour_name); 
        $title=str_replace( array( '\'', '"',
      ',' , '-', '/',' /','<', '>' ), ' ', $tour_name);
    //   $title=preg_replace('/[^a-zA-Z0-9_ -]/s',' ',$tour_name);
    //     dd($title);
        $getTourdetails=Tour::with('country','place','category','dateprice','equipment','itinerary','images','fqa','blog')->where('status','1')->where('tour_name',$title)->first();
         $getTour=Tour::with('country','place','category')->orderBy('id','desc')->where('status','=','1')->where('tour_name','!=',$title)->where('category_id',$getTourdetails->category_id)->get();
        $gethotel=Hotel::orderBy('id','desc')->where('status','=','1')->where('tour_id',$getTourdetails->id)->get();
        return view('frontend.tour.tourdetails',compact('getTourdetails','gethotel','getTour'));
    }
    public function tourMap($tour_name)
    {
        $title = str_replace('-',' ',$tour_name); 
        $gettourmap=Tour::where('tour_name',$title)->first();
        return view('frontend.tour.map',compact('gettourmap'));
    }

    public function hotelviewDetails($hotel_name)
    {
        $gethotelview=Hotel::with('country','tour')->where('hotel_name',$hotel_name)->first();
        return view('frontend.hotel.hotel-details',compact('gethotelview'));
    }
}
