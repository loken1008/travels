<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;


class BlogController extends Controller
{
       public function storeComment(Request $request)
       {
              $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'comment' => 'required',
              ]);
              Comment::create([
                'blog_id'=>$request->blog_id,
                'parent_id'=>$request->parent_id,
                'name' => $request->name,
                'email' => $request->email,
                'comment' => $request->comment,
              ]);
              return redirect()->back()->with('success','Comment Added Successfully');
       }

       public function allBlogs()
       {
           $getblogs=Blog::orderBy('id','desc')->where('status','=','1')->paginate(6);
           return view('frontend.blogs.allblogs',compact('getblogs'));
       }
       public function blogsDetails($blog_title)
       {
           $getblogs=Blog::orderBy('id','desc')->where('status','=','1')->limit(6)->get();
           $getblogdetails=Blog::where('blog_title',$blog_title)->first();
           $getcomments=Comment::with('replies')->where('blog_id',$getblogdetails->id)->where('parent_id','=',NULL)->get();
           return view('frontend.blogs.blogsdetails',compact('getblogdetails','getblogs','getcomments'));
       }
   
       public function searchBlog(Request $request){
           $search = $request->blog_search;
           $searchblog = Blog::query()
               ->where('blog_title', 'LIKE', "%{$search}%")
               ->orWhere('blog_type', 'LIKE', "%{$search}%")
               ->paginate(6);
           return view('frontend.blogs.blogssearch', compact('searchblog'));
       }
}
