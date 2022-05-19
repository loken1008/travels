<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Country;
use App\Models\Place;
use App\Models\SiteSetting;
use App\Models\Coupon;
use App\Models\Contact;
use Carbon\Carbon;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $country = Country::orderBy('country_name', 'asc')->where('status','=','1')->get();
        // $category= Category::with('tour')->orderBy('category_name', 'asc')->get();
        // // dd($category);
        // $place = Place::orderBy('place_name', 'asc')->get();
        // $sitesetting=SiteSetting::orderBy('id','desc')->first();

        // $getdate=Carbon::now()->format('Y-m-d');
        // $getcoupon=Coupon::orderBy('id','desc')->where('status','=','1')->where('coupon_validity','>=',$getdate)->first();

        // $getcontact=Contact::orderBy('id','desc')->first();
        //  View::share('country', $country);
        //  View::share('category', $category);
        //  View::share('place', $place);
        //  View::share('sitesetting', $sitesetting);
        //  View::share('getcoupon', $getcoupon);
        //  View::share('getcontact', $getcontact);
         Paginator::useBootstrap();
    }
}
