<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Carbon\Carbon;
use Image;

class BannerController extends Controller
{
    public function BannerView()
    {
        $banners = Banner::orderBy('id','desc')->get();
        return view('admin.banner.viewbanner',compact('banners'));
    }
    public function BannerStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'url' => 'required',
            'banner_image'=>'required',
        ]);
        Banner::insert([
            'title'=>$request->title,
            'sub_title'=>$request->sub_title,
            'url'=>$request->url,
            'banner_image'=>$request->banner_image,
            'status'=>1,
        ]);
        $notification=array(
            'message'=>'Banner Insert Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
    public function BannerEdit($id)
    {
        $editbanner=Banner::findOrFail($id);
        return view('admin.banner.edit',compact('editbanner'));
    }
    public function BannerUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'url' => 'required',
        ]);
        $banner_id=$request->id;
        $old_img=$request->old_image;
        if($request->banner_image){
            
        Banner::findOrfail($banner_id)->update([
            'title'=>$request->title,
            'sub_title'=>$request->sub_title,
            'url'=>$request->url,
            'banner_image'=>$request->banner_image,
        ]);
        $notification=array(
            'message'=>'Banner Update Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
        }
    
    else{

        Banner::findOrfail($banner_id)->update([
            'title'=>$request->title,
        ]);
    }
        $notification=array(
            'message'=>'Banner Update Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
      
    }
    public function BannerDelete($id)
    {
        $bannerdelete=Banner::findOrfail($id);
        $bannerdelete->delete();
        $notification=array(
            'message'=>'Banner Delete Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
    public function BannerActive($id)
    {
        $banneractive=Banner::findOrfail($id)->update(['status'=>0]);
        $notification=array(
            'message'=>'Banner Active Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
    public function BannerInactive($id)
    {
        $banneractive=Banner::findOrfail($id)->update(['status'=>1]);
        $notification=array(
            'message'=>'Banner Active Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
}
