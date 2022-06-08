<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurTeam;
use App\Models\Tour;
use App\Models\ChooseUs;
use App\Models\TermsandCondition;
use App\Models\AboutUs;


class AboutUsController extends Controller
{
   public function allTeam()
   {
      $team = OurTeam::count();
       $getteamdetails=OurTeam::where('status','=','1')->paginate(10);
      //  dd($getallteam);
      $gettour=Tour::with('country','place','category')->orderBy('id','desc')->where('status','=','1')->get();
       return view('frontend.aboutus.allteam',compact('getteamdetails','gettour','team'));
   }
   public function Introduction()
   {
         $introduction=AboutUs::first();
         return view('frontend.aboutus.introduction.introduction',compact('introduction'));
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
       $getchooseus=ChooseUs::orderBy('id','desc')->get();
         return view('frontend.aboutus.travelwithus',compact('getchooseus'));
   }

   public function TermsandCondition()
   {
         $gettermsandcondition=TermsandCondition::where('type','=','TermsConditions')->first();
            return view('frontend.aboutus.termsandcondition',compact('gettermsandcondition'));
   }
   public function PrivacyPolicy()
   {
         $getprivacypolicy=TermsandCondition::where('type','=','PrivacyPolicies')->first();
            return view('frontend.aboutus.privacypolicy',compact('getprivacypolicy'));
   }
   public function PaymentMethod()
   {
         $getpaymentmethod=TermsandCondition::where('type','=','PaymentMethod')->first();
            return view('frontend.aboutus.paymentmethod',compact('getpaymentmethod'));
   }
}
