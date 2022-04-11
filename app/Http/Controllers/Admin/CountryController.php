<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function viewCountry()
    {
        return view('admin.country.index');
    }
    public function createCountry()
    {
        return view('admin.country.create');
    }
}
