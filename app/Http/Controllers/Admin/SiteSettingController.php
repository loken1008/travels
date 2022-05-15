<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\Contact;

class SiteSettingController extends Controller
{
    public function LogoView()
    {
        $sitelogo=SiteSetting::orderBy('id','desc')->get();
        return view('admin.sitesetting.logo.viewsetting',compact('sitelogo'));
    }

    public function LogoStore(Request $request)
    {
        $request->validate([
            'logo'=>'required',
        ]);
        $data=$request->all();
        SiteSetting::create($data);
        $notification=array(
            'message'=>'Logo Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function LogoEdit($id)
    {
        $editlogo=SiteSetting::findOrFail($id);
        return view('admin.sitesetting.logo.edit',compact('editlogo'));
    }

    public function LogoUpdate(Request $request,$id)
    {

        $updatelogo=SiteSetting::findOrFail($id);
        $updatelogo->logo=$request->logo?$request->logo:$updatelogo->logo;
        $updatelogo->facebook=$request->facebook;
        $updatelogo->twitter=$request->twitter;
        $updatelogo->instagram=$request->instagram;
        $updatelogo->youtube=$request->youtube;
        $updatelogo->pinterest=$request->pinterest;
        $updatelogo->save();
        $notification=array(
            'message'=>'Logo Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.logo')->with($notification);
    }

    public function LogoDelete($id)
    {
        $logo=SiteSetting::findOrFail($id);
        $logo->delete();
        $notification=array(
            'message'=>'Logo Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    // contact 
    public function ContactView()
    {
        $contacts=Contact::orderBy('id','desc')->get();
        return view('admin.sitesetting.contact.viewcontact',compact('contacts'));
    }
    public function ContactStore(Request $request)
    {
        $request->validate([
            'phone'=>'required',
            'address'=>'required',
            'email'=>'required|email',
            'fax'=>'required',
            'mobile'=>'required',

        ]);
        $data=$request->all();
        Contact::create($data);
        $notification=array(
            'message'=>'Contact Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function ContactEdit($id)
    {
        $editcontact=Contact::findOrFail($id);
        return view('admin.sitesetting.contact.edit',compact('editcontact'));
    }
    public function ContactUpdate(Request $request,$id)
    {
        $request->validate([
            'phone'=>'required',
            'address'=>'required',
            'email'=>'required|email',
            'fax'=>'required',
            'mobile'=>'required',
        ]);
        $updatecontact=Contact::findOrFail($id);
        $data=$request->all();
        $updatecontact->update($data);
        $notification=array(
            'message'=>'Contact Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.contact')->with($notification);
    }
    public function ContactDelete($id)
    {
        $contact=Contact::findOrFail($id);
        $contact->delete();
        $notification=array(
            'message'=>'Contact Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
