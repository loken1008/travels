<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Tour;
use App\Models\PageBanner;

class CategoryController extends Controller
{
    public function __construct()
    {
        $tourbanner = PageBanner::orderBy('id', 'desc')->where('page_name', 'tour')->first();
        view()->share('tourbanner', $tourbanner);
    }
    public function tripDetails($slug_name)
    {
        $getsubcat=SubCategory::with('category','tour')->where('sub_category_slug',$slug_name)->first();
        if(!empty($getsubcat))
        {
            $getTourdetails=Tour::with('country','place','category','dateprice','equipment','itinerary','images')->where('subcategory_id',$getsubcat->id)->where('status','1')->paginate(9);
            
            return view('frontend.trip.alltrip',compact('getTourdetails','getsubcat'));
        }
        else
        {
            return redirect()->back();
        }      
      
    }

 
}
