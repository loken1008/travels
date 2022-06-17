<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CostInclude;
use App\Models\CostExclude;
use Carbon\Carbon;

class CostIncludeExcludeController extends Controller
{
 public function costincludeView()
 {
  $costinclude = CostInclude::orderBy('craeted_at', 'desc')->get();
  return view('admin.costdetails.costincludeedit', compact('costinclude'));
 }

  public function costincludeStore(Request $request)
  {
    foreach ($request->cost_include as $key => $value) {
        CostInclude::create([
            'cost_include' => $request->cost_include[$key],
            'created_at' => Carbon::now(),
        ]);
    }
    $notification=array(
      'message'=>'Cost Include Added Successfully',
      'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);

  }
public function costincludeUpdate(Request $request,$id)
{
  $costinclude = CostInclude::find($id);
  $costinclude->cost_include = $request->cost_include;
  $costinclude->save();
  $notification=array(
    'message'=>'Cost Include Updated Successfully',
    'alert-type'=>'success'
  );
  return Redirect()->back()->with($notification);
}

public  function costincludeDelete($id)
{
  $costinclude = CostInclude::find($id);
  $costinclude->delete();
  $notification=array(
    'message'=>'Cost Include Deleted Successfully',
    'alert-type'=>'success'
  );
  return Redirect()->back()->with($notification);
}

  public function costexcludeStore(Request $request)
  {
    foreach ($request->cost_exclude as $key1 => $value1) {
        CostExclude::create([
            'cost_exclude' => $request->cost_exclude[$key1],
            'created_at' => Carbon::now(),
        ]);
    }
    $notification=array(
      'message'=>'Cost Exclude Added Successfully',
      'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);

  }
  public function costexcludeUpdate(Request $request,$id)
{
  $costexclude = CostExclude::find($id);
  $costexclude->cost_exclude = $request->cost_exclude;
  $costexclude->save();
  $notification=array(
    'message'=>'Cost Exclude Updated Successfully',
    'alert-type'=>'success'
  );
  return Redirect()->back()->with($notification);
}
public function costexcludeDelete($id)
{
  $costexclude = CostExclude::find($id);
  $costexclude->delete();
  $notification=array(
    'message'=>'Cost Exclude Deleted Successfully',
    'alert-type'=>'success'
  );
  return Redirect()->back()->with($notification);
}
}
