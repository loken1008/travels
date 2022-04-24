<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Tour;


class CategoryController extends Controller
{
    public function tripDetails($slug_name)
    {
        $getsubcat=SubCategory::with('category','tour')->where('sub_category_slug',$slug_name)->first();
        if(!empty($getsubcat))
        {
            $getTourdetails=Tour::with('country','place','category','dateprice','equipment','itinerary','images')->where('subcategory_id',$getsubcat->id)->paginate(9);
            
            return view('frontend.trip.alltrip',compact('getTourdetails','getsubcat'));
        }
        else
        {
            return redirect()->back();
        }      
      
    }
}
