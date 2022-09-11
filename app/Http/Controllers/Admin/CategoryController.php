<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $categories=Category::orderBy('sort_id','asc')->get();
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
            'category_type'=>$request->category_type,
            'created_at'=>Carbon::now()
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
            $category=Category::findOrFail($category_id);
            $category->category_name=$request->category_name;
            $category->category_slug=strtolower(str_replace(' ','-',$request->category_name));
            $category->category_type=$request->category_type;
            $category->save();
            $notification=array(
                'message'=>'Category Update Successfully',
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
    public function CategoryReorder(Request $request)
    {
        // $category=Category::all();
        // foreach ($category as $tc) {
        //     foreach ($request->order as $order) {
        //         if ($order['id'] == $tc->id) {
        //             $tc->update(['sort_id' => $order['position']]);
        //         }
        //     }
        // }
        foreach ($request->order as $key => $order) {
            $category = Category::find($order['id'])->update(['sort_id' => $order['order']]);
        }
        return response('Update Successfully.', 200);
    }
}
