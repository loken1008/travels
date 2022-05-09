<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Booking;
use App\Models\Admin;
// use App\Notifications\BookingNotification;
use App\Events\BookingNotification;
use Notification;
use Mail;
use App\Mail\BookingMail;
use Auth;


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
              'first_name'=>'required',
               'last_name'=>'required',
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
            //   'g-recaptcha-response' => 'required|captcha',
         ]);
         $booking=new Booking();
         if(Auth()->guard('customer')->check()){
         $booking->customer_id=Auth::guard('customer')->user()->id;
         }
         
         $booking->tour_id=$request->tour_id;
         $booking->first_name=$request->first_name;
         $booking->last_name=$request->last_name;
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
         // event(new BookingNotification($booking));
         $getbooking=Booking::with('tour')->orderBy('id','desc')->first();
          $tourbooking=[
          'tour_name'=>$getbooking->tour->tour_name,
          'first_name'=>$getbooking->first_name,
            'last_name'=>$getbooking->last_name,
          'email'=>$getbooking->email,
          'address'=>$getbooking->address,
          'telephone'=>$getbooking->telephone,
          'mobile'=>$getbooking->mobile,
          'country'=>$getbooking->country,
          'number_people'=>$getbooking->number_people,
          'arrival_date'=>$getbooking->arrival_date,
          'departure_date'=>$getbooking->departure_date,
          'message'=>$getbooking->message,
          ];
         
         Mail::to('lokenchand260@gmail.com')->send(new BookingMail($tourbooking));
         $notification=array(
            'message'=>'You Sucessfully Book Your Trip',
            'alert-type'=>'success'
        );
         return redirect()->back()->with($notification);
   }
}
