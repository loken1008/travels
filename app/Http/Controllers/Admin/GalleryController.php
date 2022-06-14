<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function GalleryView()
    {
        $gallerys=Gallery::orderBy('id','desc')->get();
        return view('admin.gallery.viewgallery',compact('gallerys'));
    }

    public function GalleryDetails($id)
    {
        $gallerydetails=Gallery::findOrfail($id);
        return view('admin.gallery.details',compact('gallerydetails'));
    }

    public function GalleryStore(Request $request)
    {
        $this->validate($request,[
            'gallery_title'=>'required',
            'cover_image'=>'required',
            'gallery_image'=>'required',
        ]);

        $gallery=new Gallery;
        $gallery->gallery_title=$request->gallery_title;
        $gallery->cover_image=$request->cover_image;
        $gallery->gallery_image=$request->gallery_image;
        $gallery->save();
        $notification=array(
            'message'=>'Gallery Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect('gallery/view')->with($notification);
    }
    public function GalleryEdit($id)
    {
        $editgallery=Gallery::findOrfail($id);
        return view('admin.gallery.edit',compact('editgallery'));
    }

    public function GalleryUpdate(Request $request ,$id)
    {
        $this->validate($request,[
            'gallery_title'=>'required',
        ]);

        $gallery=Gallery::findOrfail($id);
        $gallery->gallery_title=$request->gallery_title;
        $gallery->cover_image=$request->cover_image?$request->cover_image:$gallery->cover_image;
        $gallery->gallery_image=$request->gallery_image?$request->gallery_image:$gallery->gallery_image;
        $gallery->save();
        $notification=array(
            'message'=>'Gallery Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect('/gallery/view')->with($notification);
    }

    public function GalleryDelete($id)
    {
        $gallery=Gallery::findOrfail($id);
        $gallery->delete();
        $notification=array(
            'message'=>'Gallery Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
