<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\PageBanner;

class SearchController extends Controller
{
    public function __construct()
    {
        $tourbanner = PageBanner::orderBy('id', 'desc')->where('page_name', 'tour')->first();
        view()->share('tourbanner', $tourbanner);
    }
    public function tourSearch(Request $request)
    {
        $search = $request->input('search');
        $searchtour = Tour::with('country','place','category')->where('tour_name', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")->where('status', '=', '1')
            ->paginate(9);
        if ($searchtour) {
            return view('frontend.search.search')->with('searchtour', $searchtour);
        } else {
            return view('frontend.search.search')->with('error', 'No Details found. Try to search again !');
        }
    }
}
