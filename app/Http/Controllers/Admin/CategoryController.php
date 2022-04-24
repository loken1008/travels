<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $categories=Category::latest()->get();
        return view('admin.category.category_view',compact('categories'));
    }

    public function CategoryStore(Request $request)
    {
        $request->validate([
            'category_name'=>'required',
        ]);
           
        Category::insert([
            'category_name'=>$request->category_name,
            'category_slug'=>strtolower(str_replace(' ','-',$request->category_name)),
        ]);
        $notification=array(
            'message'=>'category Insert Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function CategoryEdit($id)
    {
        $editcategory=Category::findOrFail($id);
        return view('admin.category.category_edit',compact('editcategory'));
    }
    public function CategoryUpdate(Request $request)
    {
        $request->validate([
            'category_name'=>'required',
        ]);
            $category_id=$request->id;
            Category::findOrFail($category_id)->update([
                'category_name'=>$request->category_name,
                'category_slug'=>strtolower(str_replace(' ','-',$request->category_name)),
            ]);
            $notification=array(
                'message'=>'category Update Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('all.category')->with($notification);
    }
    public function CategoryDelete($id)
    {
        Category::findOrFail($id)->delete();
        $notification=array(
            'message'=>'category Delete Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
}
