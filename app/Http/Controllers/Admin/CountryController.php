<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Carbon\Carbon;

class CountryController extends Controller
{
    public function viewCountry()
    {
        $getcountry=Country::orderBy('id','desc')->get();
        return view('admin.country.index',compact('getcountry'));
    }
    public function createCountry()
    {
        return view('admin.country.create');
    }

    public function storeCountry(Request $request)
    {
        $request->validate([
            'country_name'=>'required',
            'description'=>'required',
            'country_image'=>'required',
            'start_price'=>'required',
        ]);
        $country=Country::Insert([
            'country_name'=>$request->country_name,
            'description'=>$request->description,
            'country_image'=>$request->country_image,
            'start_price'=>$request->start_price,
            // 'status'=>0,
            'created_at'=>Carbon::now(),
        ]);
        if($country){
            $notification=array(
                'message'=>'Country Insert Successfully',
                'alert-type'=>'success'
            );
    }
    else{
        $notification=array(

            'message'=>'Something Went Wrong',
            'alert-type'=>'error',
        );
    }
    return redirect('/country')->with($notification);

    }

    public function editCountry($id)
    {
        $editcountry=Country::findOrfail($id);
        return view('admin.country.edit',compact('editcountry'));
      
    }
    public function updateCountry(Request $request,$id)
    {
        $request->validate([
            'country_name'=>'required',
            'description'=>'required',
            'start_price'=>'required',
        ]);
        Country::where('id',$id)->update($request->except('_token'));
        $notification=array(
            'message'=>'Country Update Successfully',
            'alert-type'=>'success'
        );
        return redirect('/country')->with($notification);
    }

    public function deleteCountry($id)
    {
        Country::findOrfail($id)->delete();
        $notification=array(
            'message'=>'Country Delete Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function changeStatus(Request $request)
    {
        $countrystatus=Country::find($request->country_id);
        $countrystatus->status=$request->status;
        $countrystatus->save();
        return response()->json(['success'=>'Status Change Successfully']);
    }
}
