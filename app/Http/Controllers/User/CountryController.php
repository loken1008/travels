<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Tour;


class CountryController extends Controller
{
    public function countryDetails($country_name)
    {
        $getcountrydetails=Country::where('country_name',$country_name)->first();
        $gettour=Tour::with('country','place','category')->where('country_id',$getcountrydetails->id)->get();
        return view('frontend.country.countrydetails',compact('getcountrydetails','gettour'));
    }
}
