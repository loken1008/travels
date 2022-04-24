<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function viewCoupon()
    {
        $coupons=Coupon::orderBy('id','DESC')->get();
        return view('admin.coupon.coupon',compact('coupons'));
    }
    public function storeCoupon(Request $request)
    {
        $request->validate([
            'coupon_name'=>'required',
            'discount_amount'=>'required',
            'coupon_validity'=>'required',
        ]);
        Coupon::insert([
            'coupon_name'=>$request->coupon_name,  //coupon_name
            'discount_amount'=>$request->discount_amount,  //discount amount
            'coupon_validity'=>$request->coupon_validity,
            'created_at'=>Carbon::now(),
        ]);
    $notification=array(
        'message'=>'Coupon Insert Successfully',
        'alert-type'=>'success'
    );
    return back()->with($notification);
    }

    public function editCoupon($id)
    {
        $editcoupon=Coupon::findOrfail($id);
        return view('admin.coupon.edit',compact('editcoupon'));
    }
    public function updateCoupon(Request $request)
    {
        $request->validate([
            'coupon_name'=>'required',
            'discount_amount'=>'required', 
            'coupon_validity'=>'required',
        ]);
        Coupon::where('id',$request->id)->update([
            'coupon_name'=>$request->coupon_name,  //coupon_name
            'discount_amount'=>$request->discount_amount,  //discount amount
            'coupon_validity'=>$request->coupon_validity,
            'created_at'=>Carbon::now(),
        ]);
    $notification=array(
        'message'=>'Coupon Update Successfully',
        'alert-type'=>'success'
    );
    return redirect('/coupon')->with($notification);
    }
    public function deleteCoupon($id)
    {
        Coupon::where('id',$id)->delete();
        $notification=array(
            'message'=>'Coupon Delete Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
    public function changeStatus(Request $request)
    {
        $couponstatus=Coupon::find($request->coupon_id);
        $couponstatus->status=$request->status;
        $couponstatus->save();
        return response()->json(['success'=>'Status Change Successfully']);
    }
   
}
