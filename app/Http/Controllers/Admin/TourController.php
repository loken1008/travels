<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Country;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Tour;
use App\Models\Images;
use App\Models\Equipment;
use App\Models\Itinerary;
use App\Models\DatesPrices;
use App\Models\FQA;
use Carbon\Carbon;
use App\Http\Requests\TourStoreRequest;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{
    public function viewTour()
    {
        $gettour = Tour::with('images', 'category', 'subcategory')
            ->orderBy('id', 'desc')
            ->get();
        // dd($gettour);
        return view('admin.tour.index', compact('gettour'));
    }
    // public function viewPackage()
    // {
    //     $getpackage=Tour::with('images')->where('type','=','package')->orderBy('id','desc')->get();
    //     // dd($gettour);
    //     return view('admin.tour.package',compact('getpackage'));
    // }
    // public function viewActivities()
    // {
    //     $getactivities=Tour::with('images')->where('type','=','activities')->orderBy('id','desc')->get();
    //     // dd($gettour);
    //     return view('admin.tour.activities',compact('getactivities'));
    // }
    public function createTour()
    {
        $getplace = Place::orderBy('place_name', 'asc')->get();
        $getcountry = Country::orderBy('country_name', 'asc')
            ->where('status', '=', '1')
            ->get();
        $getcategory = Category::orderBy('category_name', 'asc')->get();
        $getsubcategory=Subcategory::orderBy('sub_category_name','asc')->get();
        return view(
            'admin.tour.create',
            compact('getcountry', 'getplace', 'getcategory', 'getsubcategory')
        );
    }

    public function getPlace($country_id)
    {
        $getplaces = Place::where('country_id', $country_id)->get();
        return response()->json($getplaces);
    }

    public function storeTour(TourStoreRequest $request)
    {
        $tour_id = Tour::insertGetId([
            'country_id' => $request->country_id,
            'place_id' => rand(1, 100),
            'category_id' => $request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'tour_name' => $request->tour_name,
            // 'type'=>$request->type,
            'altitude' => $request->altitude,
            'tour_days' => $request->tour_days,
            'accomodation' => $request->accomodation,
            'transport' => $request->transport,
            'main_price' => $request->main_price,
            'cost_include' => $request->cost_include,
            'cost_exclude' => $request->cost_exclude,
            'description' => $request->description,
            'map_url' => $request->map_url,
            'mainImage' => $request->mainImage,
            // 'status'=>0,
            'created_at' => Carbon::now(),
        ]);

        Images::insert([
            'tour_id' => $tour_id,
            'images' => $request->images,
            'created_at' => Carbon::now(),
        ]);

        foreach ($request->start_date as $key => $value) {
            DatesPrices::create([
                'tour_id' => $tour_id,
                'start_date' => $request->start_date[$key],
                'end_date' => $request->end_date[$key],
                'price' => $request->price[$key],
                'seats_available' => $request->seats_available[$key],
                'created_at' => Carbon::now(),
            ]);
        }

        foreach ($request->equipment_name as $key1 => $value1) {
            Equipment::create([
                'tour_id' => $tour_id,
                'equipment_name' => $request->equipment_name[$key1],
                'equipment_description' =>
                    $request->equipment_description[$key1],
                'created_at' => Carbon::now(),
            ]);
        }

        foreach ($request->day_title as $key2 => $value2) {
            Itinerary::create([
                'tour_id' => $tour_id,
                'day_title' => $request->day_title[$key2],
                'long_description' => $request->long_description[$key2],
                'created_at' => Carbon::now(),
            ]);
        }
        foreach($request->question as $key3=>$value3)
     {
         $fqa=new FQA();
         $fqa->tour_id=$tour_id;
         $fqa->question=$request->question[$key3];
         $fqa->answer=$request->answer[$key3];
         $fqa->created_at =Carbon::now();
         $fqa->save();
     }
        $notification = [
            'message' => 'tour Insert Successfully',
            'alert-type' => 'success',
        ];
        return redirect('/tour/view')->with($notification);
    }

    public function viewDetailsTour($id)
    {
        $detailstour = Tour::with(
            'country',
            'place',
            'dateprice',
            'equipment',
            'itinerary',
            'images',
            'category',
            'subcategory',
            'fqa'
        )->findOrfail($id);
        return view('admin.tour.viewdetails', compact('detailstour'));
    }

    public function edittour($id)
    {
        $getcountry = Country::orderBy('country_name', 'asc')
            ->where('status', '=', '1')
            ->get();
        $getplace = Place::orderBy('place_name', 'asc')->get();
        $getcategory = Category::orderBy('category_name', 'asc')->get();
        $getsubcategory = Subcategory::orderBy(
            'sub_category_name',
            'asc'
        )->get();
        $edittour = Tour::with(
            'dateprice',
            'equipment',
            'itinerary',
            'images',
            'fqa'
        )->findOrfail($id);
        return view(
            'admin.tour.edit',
            compact(
                'edittour',
                'getcountry',
                'getplace',
                'getcategory',
                'getsubcategory'
            )
        );
    }
    public function updateTour(Request $request, $id)
    {
        $utour = Tour::findOrfail($id);
        // dd($utour);
        Tour::where('id', $id)->update([
            'country_id' => $request->country_id,
            // 'place_id' => $request->place_id,
            'category_id' => $request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'tour_name' => $request->tour_name,
            // 'type'=>$request->type,
            'altitude' => $request->altitude,
            'tour_days' => $request->tour_days,
            'accomodation' => $request->accomodation,
            'transport' => $request->transport,
            'main_price' => $request->main_price,
            'cost_include' => $request->cost_include,
            'cost_exclude' => $request->cost_exclude,
            'description' => $request->description,
            'map_url' => $request->map_url,
            'mainImage' => $request->mainImage
                ? $request->mainImage
                : $utour->mainImage,
            // 'status'=>0,
            'updated_at' => Carbon::now(),
        ]);

        $uimages = Images::where('tour_id', $id)->first();
        Images::where('tour_id', $id)->update([
            'images' => $request->images ? $request->images : $uimages->images,
            'updated_at' => Carbon::now(),
        ]);

        if ($request->dateid) {
            foreach ($request->dateid as $key => $value) {
                $date_id = $request->dateid;
                $data = [
                    'start_date' => $request->start_date[$key],
                    'end_date' => $request->end_date[$key],
                    'price' => $request->price[$key],
                    'seats_available' => $request->seats_available[$key],
                    'updated_at' => Carbon::now(),
                ];
                DatesPrices::where('id', $request->dateid[$key])->update($data);
            }
        } else {
        }  
        if ($request->equipmentid) {
            foreach ($request->equipmentid as $key1 => $value1) {
                $data1 = [
                    'equipment_name' => $request->equipment_name[$key1],
                    'equipment_description' =>
                        $request->equipment_description[$key1],
                    'updated_at' => Carbon::now(),
                ];
                Equipment::where('id', $request->equipmentid[$key1])->update(
                    $data1
                );
            }
        } else {
        }
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

        if ($request->faqid) {
            foreach ($request->faqid as $key3 => $value3) {
                $data3 = [
                    'question' => $request->question[$key3],
                    'answer' => $request->answer[$key3],
                    'updated_at' => Carbon::now(),
                ];
                FQA::where('id', $request->faqid[$key3])->update(
                    $data3
                );
            }
        } else {
        }
        $notification = [
            'message' => 'Tour Update Successfully',
            'alert-type' => 'success',
        ];
        return redirect('/tour/view')->with($notification);
    }

    public function addDatePrice(Request $request,$id)
    {
        foreach ($request->start_date as $key11 => $value11) {
            $data1 = [
                'tour_id'=>$request->tour_id,
                'start_date' => $request->start_date[$key11],
                'end_date' => $request->end_date[$key11],
                'price' => $request->price[$key11],
                'seats_available' => $request->seats_available[$key11],
                'updated_at' => Carbon::now(),
            ];
            DatesPrices::create($data1);
        }
        $notification = [
            'message' => 'Date Price Added Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
    public function deleteDatePrice($id){
        DatesPrices::findorFail($id)->delete();
        $notification = [
            'message' => 'Date Price Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
        
    }

    public function addEquipment(Request $request,$id)
    {
        foreach ($request->equipment_name as $key21 => $value21) {
            Equipment::create([
                'tour_id' => $request->tour_id,
                'equipment_name' => $request->equipment_name[$key21],
                'equipment_description' => $request->equipment_description[$key21],
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = [
            'message' => 'Equipment Added Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
    public function deleteEquipment($id){
        Equipment::findorFail($id)->delete();
        $notification = [
            'message' => 'Equipment Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
        
    }
    public function addItinery(Request $request,$id){
        foreach ($request->day_title as $key31 => $value31) {
            Itinerary::create([
                'tour_id' => $request->tour_id,
                'day_title' => $request->day_title[$key31],
                'long_description' => $request->long_description[$key31],
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = [
            'message' => 'Itinerary Added Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
    public function deleteItineries($id){
        Itinerary::findorFail($id)->delete();
        $notification = [
            'message' => 'Itinerary Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
        
    }
    public function addFaq(Request $request,$id){
        foreach ($request->question as $key41 => $value41) {
            FQA::create([
                'tour_id' => $request->tour_id,
                'question' => $request->question[$key41],
                'answer' => $request->answer[$key41],
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = [
            'message' => 'Faq Added Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
    public function deleteFaq($id){
        FQA::findorFail($id)->delete();
        $notification = [
            'message' => 'Faq Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
        
    }
    
    public function softDeleteTour($id)
    {
        Tour::findOrfail($id)->delete();
        $notification = [
            'message' => 'Tour Trashed Successfully',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    public function getTrashedTour()
    {
        $trashedTour = Tour::onlyTrashed()->get();
        return view('admin.tour.trash.trash', compact('trashedTour'));
    }
    // public function getTrashedPackage()
    // {
    //     $trashedPackage=Tour::onlyTrashed()->where('type','=','package')->get();
    //     return view('admin.tour.trash.packagetrash',compact('trashedPackage'));
    // }
    // public function getTrashedActivities()
    // {
    //     $trashedActivities=Tour::onlyTrashed()->where('type','=','activities')->get();
    //     return view('admin.tour.trash.activitiestrash',compact('trashedActivities'));
    // }

    public function restoreTour($id)
    {
        $t=Tour::withTrashed()
            ->where('id', $id)
            ->restore();
// dd($t);
        $notification = [
            'message' => 'Tour Restore Successfully',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }
    public function deleteTour($id)
    {
        Tour::withTrashed()
            ->where('id', $id)
            ->forceDelete();
        $notification = [
            'message' => 'Tour Delete Successfully',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }
    public function changeStatus(Request $request)
    {
        $tourstatus = Tour::find($request->tour_id);
        $tourstatus->status = $request->status;
        $tourstatus->save();
        return response()->json(['success' => 'Status Change Successfully']);
    }
}
