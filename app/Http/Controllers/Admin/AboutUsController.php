<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChooseUs;
use App\Models\OurTeam;
use App\Models\AboutUs;
use App\Models\TermsandCondition;


class AboutUsController extends Controller
{
    // Introduction
    public function IntroductionView()
    {
        $introduction=AboutUs::orderBy('id','desc')->get();
        return view('admin.aboutus.introduction.introduction',compact('introduction'));
    }

    public function IntroductionDetails($id)
    {
        $detailsintroduction=AboutUs::findOrfail($id);
        return view('admin.aboutus.introduction.details',compact('detailsintroduction'));
    }

    public function IntroductionStore(Request $request)
    {
        $request->validate([
            'aboutus_title'=>'required',
            'aboutus_description'=>'required',
            'aboutus_image'=>'required'
        ]);
        AboutUs::insert([
            'aboutus_title'=>$request->aboutus_title,
            'aboutus_description'=>$request->aboutus_description,
            'aboutus_image'=>$request->aboutus_image,
        ]);
        $notification=array(
            'message'=>'About Us Insert Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
public function IntroductionEdit($id)
{
    $editintroduction=AboutUs::findOrfail($id);
    return view('admin.aboutus.introduction.edit',compact('editintroduction'));
}
public function IntroductionUpdate(Request $request,$id)
{
    $request->validate([
        'aboutus_title'=>'required',
     'aboutus_description'=>'required',
    ]);
    $aboutus_image=AboutUs::findOrfail($id);
    AboutUs::where('id',$id)->update([
        'aboutus_title'=>$request->aboutus_title,
        'aboutus_description'=>$request->aboutus_description,
        'aboutus_image'=>$request->aboutus_image?$request->aboutus_image:$aboutus_image->aboutus_image,
    ]);
    $notification=array(
        'message'=>'About Us Update Successfully',
        'alert-type'=>'success'
    );
    return redirect()->route('all.introduction')->with($notification);
}
    public function IntroductionDelete($id)
    {
        AboutUs::findOrfail($id)->delete();
        $notification=array(
            'message'=>'Delete Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

        // Introduction
        public function TermsView()
        {
            $termsandconditions=TermsandCondition::orderBy('id','desc')->get();
            return view('admin.aboutus.termsandconditions.termsandconditions',compact('termsandconditions'));
        }
    
        public function TermsDetails($id)
        {
            $detailstermsandconditions=TermsandCondition::findOrfail($id);
            return view('admin.aboutus.termsandconditions.details',compact('detailstermsandconditions'));
        }
    
        public function TermsStore(Request $request)
        {
            $request->validate([
                'title'=>'required',
                'description'=>'required',
                'type'=>'required'
            ]);
          
            TermsandCondition::insert([
                'title'=>$request->title,
                'description'=>$request->description,
                'type'=>$request->type,
            ]);
            $notification=array(
                'message'=>' Insert Successfully',
                'alert-type'=>'success'
            );
            return back()->with($notification);
        }
    public function TermsEdit($id)
    {
        $edittermsandconditions=TermsandCondition::findOrfail($id);
        return view('admin.aboutus.termsandconditions.edit',compact('edittermsandconditions'));
    }
    public function TermsUpdate(Request $request,$id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'type'=>'required'
        ]);
        TermsandCondition::where('id',$id)->update([
            'title'=>$request->title,
                'description'=>$request->description,
                'type'=>$request->type,
        ]);
        $notification=array(
            'message'=>'Update Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.termsandconditions')->with($notification);
    }
        public function TermsDelete($id)
        {
            TermsandCondition::findOrfail($id)->delete();
            $notification=array(
                'message'=>'Delete Successfully',
                'alert-type'=>'success'
            );
            return back()->with($notification);
        }
    // choose us

    public function ChooseView()
    {
        $chooseus=ChooseUs::orderBy('id','desc')->get();
        return view('admin.aboutus.chooseus.chooseus',compact('chooseus'));
    }

    public function ChooseStore(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required'
        ]);
        ChooseUs::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$request->image,
        ]);
        $notification=array(
            'message'=>'Choose Us Insert Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
public function ChooseEdit($id)
{
    $editchoose=ChooseUs::findOrfail($id);
    return view('admin.aboutus.chooseus.edit',compact('editchoose'));
}
public function ChooseUpdate(Request $request,$id)
{
    $request->validate([
        'title'=>'required',
        'description'=>'required',
    ]);
    $cimage=ChooseUs::findOrfail($id);
    ChooseUs::where('id',$id)->update([
        'title'=>$request->title,
        'description'=>$request->description,
        'image'=>$request->image?$request->image:$cimage->image,
    ]);
    $notification=array(
        'message'=>'Choose Us Update Successfully',
        'alert-type'=>'success'
    );
    return redirect()->route('all.choose')->with($notification);
}
    public function ChooseDelete($id)
    {
        ChooseUs::findOrfail($id)->delete();
        $notification=array(
            'message'=>'Delete Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    // Our Team
    public function TeamView()
    {
        $ourteam=OurTeam::orderBy('id','desc')->get();
        return view('admin.aboutus.team.team-view',compact('ourteam'));
    }

    public function TeamCreate()
    {
        return view('admin.aboutus.team.create');
    }

    public function TeamStore(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'post'=>'required',
            'language'=>'required',
            'experiences'=>'required',
            'type'=>'required',
            'description'=>'required',
            'image'=>'required'
        ]);
        OurTeam::insert([
            'name'=>$request->name,
            'post'=>$request->post,
            'language'=>$request->language,
            'experiences'=>$request->experiences,
            'type'=>$request->type,
            'description'=>$request->description,
            'image'=>$request->image,
        ]);
        $notification=array(
            'message'=>'Our Team Insert Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.team')->with($notification);
    }

    public function TeamEdit($id)
    {
        $editteam=OurTeam::findOrfail($id);
        return view('admin.aboutus.team.edit',compact('editteam'));
    }
    public function TeamUpdate(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'post'=>'required',
            'language'=>'required',
            'experiences'=>'required',
            'type'=>'required',
            'description'=>'required',
        ]);
        $teamimage=OurTeam::findOrfail($id);
        OurTeam::where('id',$id)->update([
            'name'=>$request->name,
            'post'=>$request->post,
            'language'=>$request->language,
            'experiences'=>$request->experiences,
            'type'=>$request->type,
            'description'=>$request->description,
            'image'=>$request->image?$request->image:$teamimage->image,
        ]);
        $notification=array(
            'message'=>'Our Team Update Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.team')->with($notification);
    }

    public function TeamDelete($id)
    {
        OurTeam::findOrfail($id)->delete();
        $notification=array(
            'message'=>'Delete Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
    public function TeamChangeStatus(Request $request)
    {
        $teamstatus=OurTeam::find($request->team_id);
        $teamstatus->status=$request->status;
        $teamstatus->save();
        return response()->json(['success'=>'Status Change Successfully']);
    }
}
