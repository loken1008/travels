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
use Carbon\Carbon;

class IndexController extends Controller
{

    public function homePage()
    {
        $getcountry=Country::with('tours')->orderBy('country_name','asc')->where('status','=','1')->get();
        $getTour=Tour::with('country','place','category')->orderBy('id','desc')->where('status','=','1')->get();
        $getbanner=Banner::orderBy('id','desc')->where('status','=','1')->get();
        $gethotel=Hotel::orderBy('id','desc')->where('status','=','1')->get();
        $getdate=Carbon::now()->format('Y-m-d');
        $getcoupon=Coupon::orderBy('id','desc')->where('status','=','1')->where('coupon_validity','>=',$getdate)->first();
        $getblogs=Blog::orderBy('id','desc')->where('status','=','1')->limit(3)->get();
        $chooseus=ChooseUs::orderBy('id','desc')->get();
        return view('frontend.index',compact('getTour','getcountry','getbanner','gethotel','getcoupon','getblogs','chooseus'));
    }

    public function  tourDetails($tour_name)
    {
        $getTourdetails=Tour::with('country','place','category','dateprice','equipment','itinerary','images')->where('tour_name',$tour_name)->first();
        $gethotel=Hotel::orderBy('id','desc')->where('status','=','1')->where('tour_id',$getTourdetails->id)->get();
        return view('frontend.tour.tourdetails',compact('getTourdetails','gethotel'));
    }
    public function tourMap($tour_name)
    {
        $gettourmap=Tour::where('tour_name',$tour_name)->first();
        return view('frontend.tour.map',compact('gettourmap'));
    }

    public function hotelviewDetails($hotel_name)
    {
        $gethotelview=Hotel::with('country','tour')->where('hotel_name',$hotel_name)->first();
        return view('frontend.hotel.hotel-details',compact('gethotelview'));
    }
}
