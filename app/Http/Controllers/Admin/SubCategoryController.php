<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\SubSubCategory;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $category=Category::get();
        $subcategories=SubCategory::orderBy('id','desc')->latest()->get();
        return view('admin.subcategory.sub_category_view',compact('subcategories','category'));
    }

    public function SubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'sub_category_name'=>'required',
        ]);
           
        SubCategory::insert([
            'category_id'=>$request->category_id,
            'sub_category_name'=>$request->sub_category_name,
            'sub_category_slug'=>strtolower(str_replace(' ','-',$request->sub_category_name)),
        ]);
        $notification=array(
            'message'=>'SubCategory Insert Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function SubCategoryEdit($id)
    {
        $editcategory=Category::get();
        $editsubcategory=SubCategory::findOrFail($id);
        return view('admin.subcategory.sub_category_edit',compact('editsubcategory','editcategory'));
    }
    public function SubCategoryUpdate(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'sub_category_name'=>'required',
        ]);
            $subcategory_id=$request->id;
            subCategory::findOrFail($subcategory_id)->update([
                'category_id'=>$request->category_id,
                'sub_category_name'=>$request->sub_category_name,
                'sub_category_slug'=>strtolower(str_replace(' ','-',$request->sub_category_name)),
            ]);
            $notification=array(
                'message'=>'Subcategory Update Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('all.subcategory')->with($notification);
    }
    public function subCategoryDelete($id)
    {
        SubCategory::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Subcategory Delete Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function GetSubCategory($category_id)
    {
        $subcategory=SubCategory::where('category_id',$category_id)->get();
        return response()->json($subcategory);
    }

}

