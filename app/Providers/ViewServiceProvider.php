<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Country;
use App\Models\Place;
use App\Models\SiteSetting;
use App\Models\Coupon;
use App\Models\Contact;
use App\Models\User;
use App\Models\Tour;
use App\Models\PageBanner;
use Carbon\Carbon;
use DB;

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
        $country = Country::orderBy('country_name', 'asc')
            ->where('status', '=', '1')
            ->get();
        $category = Category::with('tour', 'subcategory')
            ->orderBy('created_at', 'asc')
            ->get();
        $subcategory=SubCategory::with('tour')->orderBy('sub_category_name', 'asc')->get();
        $tour = Tour::with(
            'country',
            'place',
            'category',
            'subcategory',
            'dateprice',
            'equipment',
            'itinerary',
            'images',
            'fqa',
            'blog'
        )
            ->where('status', '=', '1')
            ->get();
        $place = Place::orderBy('place_name', 'asc')->get();
        $sitesetting = SiteSetting::orderBy('id', 'desc')->first();
        $getdate = Carbon::now()->format('Y-m-d');
        $getcoupon = Coupon::orderBy('id', 'desc')
            ->where('status', '=', '1')
            ->where('coupon_validity', '>=', $getdate)
            ->first();
        $getcontact = Contact::orderBy('id', 'desc')->first();
        $user = User::first();
        $notifications = $user->unreadNotifications;
        $notif = DB::table('notifications')
            ->where('notifiable_type', '=', 'App\Models\User')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item, $key) {
                $item->data = json_decode($item->data);
                return $item;
            });
            $homepagebannerone=PageBanner::orderBy('id','desc')->where('page_name','homepageone')->first();
            $homepagebannertwo=PageBanner::orderBy('id','desc')->where('page_name','homepagetwo')->first();
            $homepagebannerthree=PageBanner::orderBy('id','desc')->where('page_name','homepagethree')->first();
        View::share('notifications', $notifications);
        View::share('notif', $notif);
        View::share('country', $country);
        View::share('category', $category);
        View::share('subcategory', $subcategory);
        View::share('place', $place);
        View::share('tour', $tour);
        View::share('place', $place);
        View::share('sitesetting', $sitesetting);
        View::share('getcoupon', $getcoupon);
        View::share('getcontact', $getcontact);
        View::share('homepagebannerone', $homepagebannerone);
        View::share('homepagebannertwo', $homepagebannertwo);
        View::share('homepagebannerthree', $homepagebannerthree);
        Paginator::useBootstrap();
    }
}
