<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Affilated;

class AffaliatedController extends Controller
{
    public function affaliatedView()
    {
        $affilated = Affilated::orderBy('id', 'desc')->get();
        return view('admin.affaliated.index', compact('affilated'));
    }
    public function affaliatedStore(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'image' => 'required',
        ]);
        $affilated = new Affilated();
        $affilated->image = $request->image;
        $affilated->type = $request->type;
        $affilated->status = 1;
        $affilated->save();
        $notification = array(
            'message' => ' Add Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
    public function affaliatedEdit($id)
    {
        $editaffilated = Affilated::findOrFail($id);
        return view('admin.affaliated.edit', compact('editaffilated'));
    }
    public function affaliatedUpdate(Request $request,$id)
    {
        $request->validate([
            'type' => 'required',
        ]);
        $affilated = Affilated::findOrFail($id);
        $affilated->image = $request->image?$request->image:$affilated->image;
        $affilated->type = $request->type;
        $affilated->save();
        $notification = array(
            'message' => ' Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.affaliated')->with($notification);
    }

    public function affaliatedDelete($id)
    {
        $affilated = Affilated::findOrFail($id);
        $affilated->delete();
        $notification = array(
            'message' => ' Delete Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
    public function affilatedActive($id)
    {
        $affilatedactive=Affilated::findOrfail($id)->update(['status'=>0]);
        $notification=array(
            'message'=>' Active Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
    public function affilatedInactive($id)
    {
        $affilatedinactive=Affilated::findOrfail($id)->update(['status'=>1]);
        $notification=array(
            'message'=>' InActive Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
}
