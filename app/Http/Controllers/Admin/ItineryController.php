<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Itinerary;
use App\Models\Equipment;
use Carbon\Carbon;

class ItineryController extends Controller
{
   public function viewItinery()
   {
      $alltour=Tour::with('itinerary','equipment')->get();
      return view('admin.itinery.index',compact('alltour'));
   }
   public function createItinery()
   {
      $getalltour=Tour::all();
      return view('admin.itinery.create',compact('getalltour'));
   }
  
   public function storeItinery(Request $request)
   {
      foreach ($request->day_title as $key2 => $value2) {
         if ($request->day_title[$key2] != null) {
             Itinerary::create([
                 'tour_id' => $request->tour_id,
                 'day_title' => $request->day_title[$key2],
                 'long_description' => $request->long_description[$key2],
                 'created_at' => Carbon::now(),
             ]);
         }
        
     }
     $notification = array(
      'message' => 'Itinery Created Successfully',
      'alert-type' => 'success'
  );
  return redirect()->route('itinery.create')->with($notification);
   }
   public function storeEquipment(Request $request)
   {
      foreach ($request->equipment_name as $key1 => $value1) {
         if ($request->equipment_name[$key1] != null) {
             Equipment::create([
                 'tour_id' => $request->tour_id,
                 'equipment_name' => $request->equipment_name[$key1],
                 'equipment_description' =>
                     $request->equipment_description[$key1],
                 'created_at' => Carbon::now(),
             ]);
         }
        
      }
      $notification=array(
         'message'=>'Equipment Created Successfully',
         'alert-type'=>'success'
     );
       return redirect()->route('itinery.create')->with($notification);
   }
   public function editItinery($id)
   {
      $edititinery=Tour::with('itinerary')->find($id);
      return view('admin.itinery.edit',compact('edititinery'));
   }
   public function editEquipment($id)
   {
      $editequipment=Tour::with('equipment')->find($id);
      return view('admin.itinery.editequipment',compact('editequipment'));
   }

   public function updateItinery(Request $request,$id)
   {
           if ($request->itineraryid) {
            foreach ($request->itineraryid as $key2 => $value2) {
                $data2 = [
                    'day_title' => $request->day_title[$key2],
                    'long_description' => $request->long_description[$key2],
                    'updated_at' => Carbon::now(),
                ];
                Itinerary::where('id', $request->itineraryid[$key2])->update(
                    $data2
                );
            }
        } else {
         
            
        }
      $notification=array(
         'message'=>'Itinery Updated Successfully',
         'alert-type'=>'success'
     );
       return redirect()->route('itinery.edit',$id)->with($notification);
   }

   public function updateEquipment(Request $request,$id)
   {  
    
    if ($request->equipmentid) {   
     foreach($request->equipmentid as $key1=>$value1){
       $equp=Equipment::firstOrCreate($attributes=array('id'=>$request->equipmentid[$key1]));
       $equp->tour_id=$value1['tour_id'];
         $equp->equipment_name=$value1['equipment_name'];
            $equp->equipment_description=$value1['equipment_description'];
            $equp->save();
    }
   
    }
    $notification=array(
        'message'=>'Equipment Updated Successfully',
        'alert-type'=>'success'
  );
    
    return redirect()->route('equipment.edit',$id)->with($notification);
        
   }
   public function deleteItinery($id)
   {
      $deleteitinery=Itinerary::find($id);
      $deleteitinery->delete();
      $notification=array(
         'message'=>'Itinery Deleted Successfully',
         'alert-type'=>'success'
     );
       return redirect()->back()->with($notification);
   }
   public function deleteEquipment($id)
   {
      $deleteequipment=Equipment::find($id);
      $deleteequipment->delete();
      $notification=array(
         'message'=>'Equipment Deleted Successfully',
         'alert-type'=>'success'
     );
       return redirect()->back()->with($notification);
   }
}

