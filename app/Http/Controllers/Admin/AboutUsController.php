<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChooseUs;

class AboutUsController extends Controller
{
    public function ChooseView()
    {
        $chooseus=ChooseUs::orderBy('id','desc')->get();
        return view('admin.aboutus.chooseus.chooseus',compact('chooseus'));
    }

    public function ChooseStore(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required'
        ]);
        ChooseUs::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$request->image,
        ]);
        $notification=array(
            'message'=>'Choose Us Insert Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
public function ChooseEdit($id)
{
    $editchoose=ChooseUs::findOrfail($id);
    return view('admin.aboutus.chooseus.edit',compact('editchoose'));
}
public function ChooseUpdate(Request $request,$id)
{
    $request->validate([
        'title'=>'required',
        'description'=>'required',
    ]);
    $cimage=ChooseUs::findOrfail($id);
    ChooseUs::where('id',$id)->update([
        'title'=>$request->title,
        'description'=>$request->description,
        'image'=>$request->image?$request->image:$cimage->image,
    ]);
    $notification=array(
        'message'=>'Choose Us Update Successfully',
        'alert-type'=>'success'
    );
    return back()->with($notification);
}
    public function ChooseDelete($id)
    {
        ChooseUs::findOrfail($id)->delete();
        $notification=array(
            'message'=>'Delete Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
}
