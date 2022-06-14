<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\Customer;
use Auth;
use App\Rules\CheckOldPassword;
use Hash;
use App\Models\Booking;
use App\Models\PageBanner;

class UserController extends Controller
{ 
    public function __construct()
    {
        $userbanner = PageBanner::orderBy('id', 'desc')->where('page_name', 'homepageone')->first();
        view()->share('userbanner', $userbanner);
    }
    public function CustomerDashboard()
    {

        $customer_id=Auth::guard('customer')->user()->id;
        $bookings=Booking::with('customer','tour')->orderBy('id','desc')->where('customer_id',$customer_id)->paginate(5);
        return view('frontend.dashboard.dashboard',compact('bookings'));
    }

    public function DeleteBooking($id)
    {
        $booking=Booking::findOrfail($id);
        $booking->delete();
        $notification=array(
            'message'=>'Booking Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    
    public function ImageUpload(Request $request)
    {
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);
        $customer_id=Auth::guard('customer')->user()->id;
        $customer=Customer::find($customer_id);
        if($request->file('image')){
            $customerimage=$request->image;
            $filename = time().'.'.$customerimage->getClientOriginalExtension();
            $destinationpath=public_path().'/frontend/images/users/';
            if(!file_exists($destinationpath)){
                mkdir($destinationpath,0777,true);
            }
            $userUpload=Image::make($customerimage);
            $userUpload->resize(370,370);
            $userUpload->save($destinationpath.$filename);

        }
        else{
            $filename = $customer->image;
        }
        $customer->image = $filename;
        $customer->save();
        $notification = array(
            'message' => 'Profile Image Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ProfileUpdate(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'country' => 'required',
        ]);
        $customer_id=Auth::guard('customer')->user()->id;
        $customer=Customer::where('id',$customer_id)->update($request->except('_token'));
        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ChangePassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required', new CheckOldPassword],
            'new_password'=>'required|min:6|max:20',
            'confirm_password' => ['same:new_password']
        ]);
  
        Customer::find(Auth()->guard('customer')->user()->id)->update(['password' => Hash::make($request->new_password)]);
        $notification = array(
            'message' => 'Password Changed Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
}
