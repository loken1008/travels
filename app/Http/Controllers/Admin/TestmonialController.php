<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testmonial;
use Carbon\Carbon;

class TestmonialController extends Controller
{
    public function TestmonialView()
    {
        $testmonials = Testmonial::orderBy('id','desc')->get();
        return view('admin.testmonial.viewtestmonial',compact('testmonials'));
    }
    public function TestmonialStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'message_title' => 'required',
            'message_description' => 'required',
            'rating' => 'required',
            'type' => 'required',
            'country' => 'required',
            'image'=>'required',
        ]);
        Testmonial::insert([
            'name' => $request->name,
            'message_title' => $request->message_title,
            'message_description' => $request->message_description,
            'rating' => $request->rating,
            'type' => $request->type,
            'country' => $request->country,
            'image' => $request->image,
            'status'=>1,
            'created_at'=>Carbon::now('M d, Y'),
        ]);
        $notification=array(
            'message'=>'Testmonial Insert Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.testmonial')->with($notification);
    }
    public function TestmonialEdit($id)
    {
        $edittestmonial=Testmonial::findOrFail($id);
        return view('admin.testmonial.edit',compact('edittestmonial'));
    }
    public function TestmonialUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'message_title' => 'required',
            'message_description' => 'required',
            'rating' => 'required',
            'type' => 'required',
            'country' => 'required',
        ]);
        $testmonial_id=$request->id;
        if($request->image){
            
        Testmonial::findOrfail($testmonial_id)->update([
            'name' => $request->name,
            'message_title' => $request->message_title,
            'message_description' => $request->message_description,
            'rating' => $request->rating,
            'type' => $request->type,
            'country' => $request->country,
            'image' => $request->image,
        ]);
        $notification=array(
            'message'=>'Testmonial Update Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.testmonial')->with($notification);
        }
    
    else{

        Testmonial::findOrfail($testmonial_id)->update([
            'name' => $request->name,
            'message_title' => $request->message_title,
            'message_description' => $request->message_description,
            'rating' => $request->rating,
            'type' => $request->type,
            'country' => $request->country,
        ]);
    }
        $notification=array(
            'message'=>'Testmonial Update Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.testmonial')->with($notification);
      
    }
    public function TestmonialDelete($id)
    {
        $testmonialdelete=Testmonial::findOrfail($id);
        $testmonialdelete->delete();
        $notification=array(
            'message'=>'Testmonial Delete Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
    public function TestmonialActive($id)
    {
        $testmonialactive=Testmonial::findOrfail($id)->update(['status'=>0]);
        $notification=array(
            'message'=>'Testmonial Active Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
    public function TestmonialInactive($id)
    {
        $testmonialactive=Testmonial::findOrfail($id)->update(['status'=>1]);
        $notification=array(
            'message'=>'Testmonial Active Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
}
