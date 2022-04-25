<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Booking;

class BookingController extends Controller
{
   public function onlineBooking($tour_name)
   {
      
    $tour=Tour::with('country','place')->where('tour_name',$tour_name)->first();
    $getTour=Tour::with('country','place','category')->orderBy('id','desc')->where('status','=','1')->get();
       return view('frontend.bookform.bookform',compact('getTour','tour'));
   }

   public function storeBooking(Request $request)
   {
         $request->validate([
              'fullname'=>'required',
              'email'=>'required',
              'address'=>'required',
              'post_code'=>'required',
              'telephone'=>'required',
              'mobile'=>'required',
              'country'=>'required',
              'number_people'=>'required',
              'arrival_date'=>'required',
              'departure_date'=>'required',
              'message'=>'required',
              'g-recaptcha-response' => 'required|captcha',
         ]);
         $booking=new Booking();
         $booking->tour_id=$request->tour_id;
         $booking->fullname=$request->fullname;
         $booking->email=$request->email;
         $booking->address=$request->address;
         $booking->post_code=$request->post_code;
         $booking->telephone=$request->telephone;
         $booking->mobile=$request->mobile;
         $booking->country=$request->country;
         $booking->number_people=$request->number_people;
         $booking->arrival_date=$request->arrival_date;
         $booking->departure_date=$request->departure_date;
         $booking->message=$request->message;
         $booking->save();
         return redirect()->back()->with('success','Booking Successfully');
   }
}
