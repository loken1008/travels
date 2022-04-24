<?php

namespace App\Providers;
use App\Models\Category;
use App\Models\Country;
use App\Models\Place;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        $country = Country::orderBy('country_name', 'asc')->where('status','=','1')->get();
        $category= Category::orderBy('category_name', 'asc')->get();
          $place = Place::orderBy('place_name', 'asc')->get();
         View::share('country', $country);
         View::share('category', $category);
         View::share('place', $place);

         Paginator::useBootstrap();
    }
}
