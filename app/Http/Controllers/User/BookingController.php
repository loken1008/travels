<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Booking;
use App\Models\Admin;
use Notification;
use Mail;
use App\Mail\BookingMail;
use Auth;
use App\Events\BookingMessage;
use App\Notifications\BookingNotification;
use App\Models\User;
use App\Models\PageBanner;


class BookingController extends Controller
{
   public function onlineBooking($slug)
   {
    $tour=Tour::with('country','place')->where('slug',$slug)->first();
    $getTour=Tour::with('country','place','category')->orderBy('id','desc')->where('status','=','1')->get();
    $bookbanner=PageBanner::orderBy('id','desc')->where('page_name','booking')->first();
       return view('frontend.bookform.bookform',compact('getTour','tour','bookbanner'));
   }

   public function storeBooking(Request $request)
   {
         $request->validate([
              'tour_id'=>'required',
              'full_name'=>'required',
              'email'=>'required',
              'mobile'=>'required',
              'country'=>'required',
              'number_people'=>'required',
            //   'g-recaptcha-response' => 'required|captcha',
         ]);
         $booking=new Booking();
         if(Auth()->guard('customer')->check()){
         $booking->customer_id=Auth::guard('customer')->user()->id;
         }
         
         $booking->tour_id=$request->tour_id;
         $booking->full_name=$request->full_name;
         $booking->email=$request->email;
         $booking->address=$request->address;
         $booking->mobile=$request->mobile;
         $booking->country=$request->country;
         $booking->number_people=$request->number_people;
         $booking->arrival_date=$request->arrival_date;
         $booking->departure_date=$request->departure_date;
         $booking->start_date=$request->start_date;
         $booking->tour_days=$request->tour_days;
         $booking->message=$request->message;
         $booking->save();
         $user = User::first();
         $getbooking=Booking::with('tour')->first();
         $user->notify(new BookingNotification($booking));
         $getbooking->notify(new BookingNotification($booking));
         if((int)$booking->tour_id){
         event(new BookingMessage($booking['full_name'].'.'.'has booked'.'.'.$booking['tour']['tour_name']));
         }else{
            event(new BookingMessage($booking['full_name'].'.'.'has booked'.'.'.$booking['tour_id']));
         }
         if((int)$getbooking->tour_id){
            $tourbooking=[
            'tour_name'=>$getbooking->tour->tour_name,
            'full_name'=>$getbooking->full_name,
            'email'=>$getbooking->email,
            'mobile'=>$getbooking->mobile,
            'country'=>$getbooking->country,
            'number_people'=>$getbooking->number_people,
            ];
           }else{
              $tourbooking=[
                 'tour_name'=>$getbooking->tour_id,
                 'full_name'=>$getbooking->full_name,
                 'email'=>$getbooking->email,
                 'mobile'=>$getbooking->mobile,
                 'country'=>$getbooking->country,
                 'number_people'=>$getbooking->number_people,
                 ];
           }
         
         // Mail::to('info@mountainguidetrek.com')->send(new BookingMail($tourbooking));
         $notification=array(
            'message'=>'You Sucessfully Book Your Trip',
            'alert-type'=>'success'
        );
         return redirect()->back()->with($notification);
   }
}
