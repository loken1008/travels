<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;

class SearchController extends Controller
{
    public function tourSearch(Request $request)
    {
        $search = $request->input('search');
        $searchtour = Tour::with('country','place','category')->where('tour_name', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")->where('status', '=', '1')
            ->paginate(10);
        if ($searchtour) {
            return view('frontend.search.search')->with('searchtour', $searchtour);
        } else {
            return view('frontend.search.search')->with('error', 'No Details found. Try to search again !');
        }
    }
}
