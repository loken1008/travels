<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurTeam;
use App\Models\Tour;
use App\Models\ChooseUs;
use App\Models\TermsandCondition;


class AboutUsController extends Controller
{
   public function allTeam()
   {
       $getallteam=OurTeam::orderBy('id','desc')->where('status','=','1')->paginate(8);
      //  dd($getallteam);
       return view('frontend.aboutus.allteam',compact('getallteam'));
   }

   public function TeamDetails($name)
   {
         $getteamdetails=OurTeam::where('name',$name)->where('status',1)->first();
         $gettour=Tour::with('country','place','category')->orderBy('id','desc')->where('status','=','1')->get();
         return view('frontend.aboutus.teamdetails',compact('getteamdetails','gettour'));
   }

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
