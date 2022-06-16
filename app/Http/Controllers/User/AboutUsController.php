<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurTeam;
use App\Models\Tour;
use App\Models\ChooseUs;
use App\Models\TermsandCondition;
use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\PageBanner;
use App\Models\Category;


class AboutUsController extends Controller
{

   public function __construct()
    {
       $getcategory=Category::with('tour')->orderBy('id','desc')->limit(3)->get();
       $getblogs=Blog::orderBy('id','desc')->where('status','=','1')->limit(5)->get();
       view()->share('getcategory',$getcategory);
         view()->share('getblogs',$getblogs);
    }
   public function allTeam()
   {
      $team = OurTeam::count();
       $getteamdetails=OurTeam::where('status','=','1')->paginate(10);
       $teambanner=PageBanner::orderBy('id','desc')->where('page_name','team')->first();
       return view('frontend.aboutus.allteam',compact('getteamdetails','team','teambanner'));
   }
   public function Introduction()
   {
         $introduction=AboutUs::first();
         $intropagebanner=PageBanner::orderBy('id','desc')->where('page_name','introduction')->first();
         return view('frontend.aboutus.introduction.introduction',compact('introduction','intropagebanner'));
   }

//    public function TeamDetails($name)
//    {
//          $name=str_replace('-',' ',$name);
//          $getteamdetails=OurTeam::where('name',$name)->where('status',1)->first();
//          $gettour=Tour::with('country','place','category')->orderBy('id','desc')->where('status','=','1')->get();
//          return view('frontend.aboutus.teamdetails',compact('getteamdetails','gettour'));
//    }

   public function travelWithUs()
   {
       $getchooseus=ChooseUs::orderBy('id','asc')->get();
       $chooseus=PageBanner::orderBy('id','desc')->where('page_name','chooseus')->first();
         return view('frontend.aboutus.travelwithus',compact('getchooseus','chooseus'));
   }

   public function TermsandCondition()
   {
         $gettermsandcondition=TermsandCondition::where('type','=','TermsConditions')->first();
         $terms=PageBanner::orderBy('id','desc')->where('page_name','terms')->first();
            return view('frontend.aboutus.termsandcondition',compact('gettermsandcondition','terms'));
   }
   public function PrivacyPolicy()
   {
         $getprivacypolicy=TermsandCondition::where('type','=','PrivacyPolicies')->first();
         $privacy=PageBanner::orderBy('id','desc')->where('page_name','privacy')->first();
            return view('frontend.aboutus.privacypolicy',compact('getprivacypolicy','privacy'));
   }
   public function PaymentMethod()
   {
         $getpaymentmethod=TermsandCondition::where('type','=','PaymentMethod')->first();
         $payment=PageBanner::orderBy('id','desc')->where('page_name','payment')->first();
            return view('frontend.aboutus.paymentmethod',compact('getpaymentmethod','payment'));
   }
}
