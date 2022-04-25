<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Country;
use App\Models\Tour;
use App\Models\Booking;

use Carbon\Carbon;

class HotelController extends Controller
{
    public function viewHotel()
    {
        $gethotel=Hotel::with('country','tour')->orderBy('id','desc')->get();
        return view('admin.hotel.view',compact('gethotel'));
    }
    public function viewHotelDetails($id)
    {
        $detailshotel=Hotel::with('country','tour')->where('id',$id)->first();
        return view('admin.hotel.details',compact('detailshotel'));
    }
    public function createHotel()
    {
        $getcountry=Country::orderBy('id','desc')->where('status','1')->get();
        $gettour=Tour::orderBy('id','desc')->where('status','1')->get();
        return view('admin.hotel.create',compact('getcountry','gettour'));
    }

    public function storeHotel(Request $request)
    {
        $request->validate([
            'country_id'=>'required',
            'hotel_name'=>'required',
            'hotel_address'=>'required',
            'hotel_description'=>'required',
            'map_link'=>'required',
            'image'=>'required',
        ]);
        $country=Hotel::Insert([
            'country_id'=>$request->country_id,
            'tour_id'=>$request->tour_id,
            'hotel_name'=>$request->hotel_name,
            'hotel_address'=>$request->hotel_address,
            'hotel_phone'=>$request->hotel_phone,
            'hotel_description'=>$request->hotel_description,
            'map_link'=>$request->map_link,
            'image'=>$request->image,
            'created_at'=>Carbon::now(),
        ]);
     
            $notification=array(
                'message'=>'Hotel Insert Successfully',
                'alert-type'=>'success'
            );
   
        return redirect('/hotel')->with($notification);

    }

    public function editHotel($id)
    {
        $getcountry=Country::orderBy('id','desc')->where('status','1')->get();
        $gettour=Tour::orderBy('id','desc')->where('status','1')->get();
        $edithotel=Hotel::findOrfail($id);
        return view('admin.hotel.edit',compact('edithotel','getcountry','gettour'));
      
    }
    public function updateHotel(Request $request,$id)
    {
        $request->validate([
            'country_id'=>'required',
            'hotel_name'=>'required',
            'hotel_address'=>'required',
            'hotel_description'=>'required',
            'map_link'=>'required',
        ]);
        $uhotel=Hotel::findOrfail($id);
        Hotel::where('id',$id)->update([
            'country_id'=>$request->country_id,
            'tour_id'=>$request->tour_id,
            'hotel_name'=>$request->hotel_name,
            'hotel_address'=>$request->hotel_address,
            'hotel_phone'=>$request->hotel_phone,
            'hotel_description'=>$request->hotel_description,
            'map_link'=>$request->map_link,
            'image'=>$request->image?$request->image:$uhotel->image,
            'updated_at'=>Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Hotel Update Successfully',
            'alert-type'=>'success'
        );
        return redirect('/hotel')->with($notification);
    }

    public function deleteHotel($id)
    {
        Hotel::findOrfail($id)->delete();
        $notification=array(
            'message'=>'Hotel Delete Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function changeHotelStatus(Request $request)
    {
        $hotelstatus=Hotel::find($request->hotel_id);
        $hotelstatus->status=$request->status;
        $hotelstatus->save();
        return response()->json(['success'=>'Status Change Successfully']);
    }

    // booking
    public function BookingView(){
        $getbooking=Booking::with('country','tour')->orderBy('id','desc')->get();
        return view('admin.booking.booking',compact('getbooking'));
    }
    public function BookingViewDetails($id){
        $detailshotel=Booking::with('country','tour')->where('id',$id)->first();
        return view('admin.booking.details',compact('detailshotel'));
    }
}
