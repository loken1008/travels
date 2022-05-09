<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FQA;
use App\Models\Tour;

class FQAController extends Controller
{
   public function FQAView()
   {
       $gettour=Tour::where('status','1')->get();
       $allfqa=FQA::orderBy('id','desc')->get();
       return view('admin.fqa.fqa',compact('gettour','allfqa'));
   }

   public function FQAViewDetails($id)
   {
         
         $fqadetails=FQA::where('id',$id)->first();
         return view('admin.fqa.details',compact('fqadetails'));
   }

   public function FQAStore(Request $request)
   {
       $request->validate([
           'tour_id.*'=>'required',
           'question.*'=>'required',
           'answer.*'=>'required',
       ]);
     foreach($request->question as $key=>$value)
     {
         $fqa=new FQA();
         $fqa->tour_id=$request->tour_id;
         $fqa->question=$request->question[$key];
         $fqa->answer=$request->answer[$key];
         $fqa->save();
     }
     $notification=array(
         'message'=>'FQA Inserted Successfully',
         'alert-type'=>'success'
     );
        return redirect()->back()->with($notification);
   }

   public function FQAEdit($id)
   {
         $editfqa=FQA::where('id',$id)->first();
         $gettour=Tour::where('status','1')->get();
         return view('admin.fqa.edit',compact('editfqa','gettour'));
   }

   public function FQAUpdate(Request $request,$id)
   {
       $request->validate([
           'tour_id'=>'required',
           'question'=>'required',
           'answer'=>'required',
       ]);
       $fqa=FQA::find($id);
       $fqa->tour_id=$request->tour_id;
       $fqa->question=$request->question;
       $fqa->answer=$request->answer;
       $fqa->save();
       $notification=array(
           'message'=>'FQA Updated Successfully',
           'alert-type'=>'success'
       );
       return redirect('/fqa/view')->with($notification);
   }

   public function FQADelete($id)
   {
       $fqa=FQA::findorFail($id);
       $fqa->delete();
       $notification=array(
           'message'=>'FQA Deleted Successfully',
           'alert-type'=>'success'
       );
       return redirect()->back()->with($notification);
   }

   public function changeFQAStatus(Request $request)
   {
       $fqastatus=FQA::find($request->fqa_id);
       $fqastatus->status=$request->status;
       $fqastatus->save();
       return response()->json(['success'=>'Status Change Successfully']);
   }
}
