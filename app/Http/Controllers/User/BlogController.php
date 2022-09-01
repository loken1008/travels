<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\PageBanner;
use App\Models\Testmonial;

class BlogController extends Controller
{
      public function __construct()
        {
          $blogbanner=PageBanner::orderBy('id','desc')->where('page_name','blogs')->first();
          view()->share('blogbanner',$blogbanner);
        }
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
              $notification=array(
                'message'=>'Comment Successfully',
                'alert-type'=>'success'
              );
              return redirect()->back()->with($notification);
       }

       public function allBlogs()
       {
           $getblogs=Blog::orderBy('id','desc')->where('status','=','1')->paginate(12);
           return view('frontend.blogs.allblogs',compact('getblogs'));
       }
       public function blogsDetails($slug)
       {
           $getblogs=Blog::orderBy('id','desc')->where('status','=','1')->limit(12)->get();
           $getblogdetails=Blog::where('slug',$slug)->first();
           $getcomments=Comment::with('replies')->where('blog_id',$getblogdetails->id)->where('parent_id','=',NULL)->get();
           return view('frontend.blogs.blogsdetails',compact('getblogdetails','getblogs','getcomments'));
       }
   
       public function searchBlog(Request $request){
           $search = $request->input('blog_search');
               $searchblog=Blog::where(function ($q) use ($search) {
                $q->where('blog_title', 'like', $search . '%')
                    ->orWhere('blog_title', 'like', '% ' . $search . '%');
            })
            ->orWhere(function ($q) use ($search) {
                $q->where('blog_type', 'like', $search . '%')
                    ->orWhere('blog_type', 'like', '% ' . $search . '%');
            })->paginate(10);
           return view('frontend.blogs.blogssearch', compact('searchblog'));
       }

       public function viewTestimonials(){
            $gettestimonials=Testmonial::orderBy('id','desc')->where('status','=','1')->paginate(10);
            return view('frontend.testimonial.testimonial',compact('gettestimonials'));

       }
}
