<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Country;
use App\Models\Banner;


class IndexController extends Controller
{

    public function homePage()
    {
        $getcountry=Country::with('tours')->orderBy('country_name','asc')->where('status','=','1')->get();
        $getTour=Tour::with('country','place','category')->orderBy('id','desc')->get();
        $getbanner=Banner::orderBy('id','desc')->where('status','=','1')->get();
        return view('frontend.index',compact('getTour','getcountry','getbanner'));
    }

    public function  tourDetails($tour_name)
    {
        $getTourdetails=Tour::with('country','place','category','dateprice','equipment','itinerary','images')->where('tour_name',$tour_name)->first();
        return view('frontend.tour.tourdetails',compact('getTourdetails'));
    }
}
