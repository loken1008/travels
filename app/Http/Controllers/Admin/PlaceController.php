<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Country;
use Carbon\Carbon;


class PlaceController extends Controller
{
    public function viewPlace()
    {
        $getplace=Place::orderBy('id','desc')->get();
        return view('admin.place.index',compact('getplace'));
    }
    public function createPlace()
    {
        $getcountry=Country::orderBy('country_name','asc')->get();
        return view('admin.place.create',compact('getcountry'));
    }

    public function storePlace(Request $request)
    {
        $request->validate([
            'country_id'=>'required',
            'place_name'=>'required',
            'description'=>'required'
        ]);
        $place=Place::Insert([
            'country_id'=>$request->country_id,
            'place_name'=>$request->place_name,
            'description'=>$request->description,
            // 'status'=>0,
            'created_at'=>Carbon::now(),
        ]);
        if($place){
            $notification=array(
                'message'=>'Place Insert Successfully',
                'alert-type'=>'success'
            );
    }
    else{
        $notification=array(

            'message'=>'Something Went Wrong',
            'alert-type'=>'error',
        );
    }
    return redirect('/place')->with($notification);

    }

    public function editPlace($id)
    {
        $getcountry=Country::orderBy('country_name','asc')->get();
        $editplace=Place::findOrfail($id);
        return view('admin.place.edit',compact('editplace','getcountry'));
      
    }
    public function updatePlace(Request $request,$id)
    {
        Place::where('id',$id)->update($request->except('_token'));
        $notification=array(
            'message'=>'Place Update Successfully',
            'alert-type'=>'success'
        );
        return redirect('/place')->with($notification);
    }

    public function deletePlace($id)
    {
        Place::findOrfail($id)->delete();
        $notification=array(
            'message'=>'Place Delete Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function changeStatus(Request $request)
    {
        $placestatus=Place::find($request->place_id);
        $placestatus->status=$request->status;
        $placestatus->save();
        return response()->json(['success'=>'Status Change Successfully']);
    }
}
