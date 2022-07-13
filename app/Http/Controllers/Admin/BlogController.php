<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Tour;
use Str;

use Carbon\Carbon;

class BlogController extends Controller
{
    public function viewBlog()
    {
        $getblog=Blog::with('tour')->orderBy('id','desc')->get();
        return view('admin.blogs.blogview',compact('getblog'));
    }
    public function viewBlogDetails($id)
    {
        $detailsblog=Blog::where('id',$id)->first();
        return view('admin.blogs.details',compact('detailsblog'));
    }

    public function viewBlogComment()
    {
        $getcomment=Comment::with('blogs','replies')->get();
        // dd($getcomment);
        return view('admin.blogs.commentview',compact('getcomment'));
    }

    public function viewBlogCommentDetails($id)
    {
        $detailscomment=Comment::with('blogs','replies')->where('id',$id)->where('parent_id','=',NULL)->first();
        return view('admin.blogs.commentdetails',compact('detailscomment'));
    }
 
    public function deleteBlogComment($id)
    {
        $deletecomment=Comment::where('id',$id)->delete();
        $notification=array(
            'message'=>'Comment Delete Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function createBlog()
    {
        $tours=Tour::orderBy('id','desc')->get();
        return view('admin.blogs.create',compact('tours'));
    }

    public function storeBlog(Request $request)
    {
        $request->validate([
            'blog_title'=>'required',
            'blog_description'=>'required',
            'author_name'=>'required',
            'blog_type'=>'required',
            'blog_image'=>'required',
        ]);
        Blog::insert([
            'tour_id'=>$request->tour_id,
            'blog_title'=>$request->blog_title,
            'slug'=>Str::slug($request->blog_title),
            'blog_description'=>$request->blog_description,
            'author_name'=>$request->author_name,
            'blog_type'=>$request->blog_type,
            'blog_image'=>$request->blog_image,
            'img_alt'=>$request->img_alt,
            'meta_title'=>$request->meta_title,
            'meta_keywords'=>$request->meta_keywords,
            'meta_description'=>$request->meta_description,
            'created_at'=>Carbon::now(),
        ]);
     
            $notification=array(
                'message'=>'Blog Insert Successfully',
                'alert-type'=>'success'
            );
   
        return redirect('/mgiadmin/blog/view')->with($notification);

    }

    public function editBlog($id)
    {
      
        $editblog=Blog::findOrfail($id);
        $tours=Tour::orderBy('id','desc')->get();
        return view('admin.blogs.edit',compact('editblog','tours'));
      
    }
    public function updateBlog(Request $request,$id)
    {
        $request->validate([
            'blog_title'=>'required',
            'blog_description'=>'required',
            'author_name'=>'required',
            'blog_type'=>'required',   
        ]);
        $ublog=Blog::findOrfail($id);
        Blog::where('id',$id)->update([
            'tour_id'=>$request->tour_id,
            'blog_title'=>$request->blog_title,
            'slug'=>Str::slug($request->blog_title),
            'blog_description'=>$request->blog_description,
            'author_name'=>$request->author_name,
            'blog_type'=>$request->blog_type,
            'blog_image'=>$request->blog_image?$request->blog_image:$ublog->blog_image,
            'img_alt'=>$request->img_alt?$request->img_alt:$ublog->img_alt,
            'meta_title'=>$request->meta_title?$request->meta_title:$ublog->meta_title,
            'meta_keywords'=>$request->meta_keywords?$request->meta_keywords:$ublog->meta_keywords,
            'meta_description'=>$request->meta_description?$request->meta_description:$ublog->meta_description,
            'updated_at'=>Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Blog Update Successfully',
            'alert-type'=>'success'
        );
        return redirect('/mgiadmin/blog/view')->with($notification);
    }

    public function deleteBlog($id)
    {
        Blog::findOrfail($id)->delete();
        $notification=array(
            'message'=>'Blog Delete Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function changeBlogStatus(Request $request)
    {
        $blogstatus=Blog::find($request->blog_id);
        $blogstatus->status=$request->status;
        $blogstatus->save();
        return response()->json(['success'=>'Status Change Successfully']);
    }
}
