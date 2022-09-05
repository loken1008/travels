<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\Contact;
use App\Models\PageBanner;


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
            'footer_logo'=>'required'
        ]);
        $data=$request->all();
        SiteSetting::create($data);
        $notification=array(
            'message'=>'Logo Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.logo')->with($notification);
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
        $updatelogo->footer_logo=$request->footer_logo?$request->footer_logo:$updatelogo->footer_logo;
        $updatelogo->facebook=$request->facebook;
        $updatelogo->twitter=$request->twitter;
        $updatelogo->linkedin=$request->linkedin;
        $updatelogo->google=$request->google;
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
            'serve_since'=>'required',
            'regd_no'=>'required',
            'profile_image'=>'required',
            'name'=>'required',
        ]);
        $data=$request->all();
        Contact::create($data);
        $notification=array(
            'message'=>'Contact Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.contact')->with($notification);
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
            'serve_since'=>'required',
            'regd_no'=>'required',
            // 'profile_image'=>'required',
            'name'=>'required'
        ]);
        $updatecontact=Contact::findOrFail($id);
        $updatecontact->profile_image=$request->profile_image?? $updatecontact->profile_image=$updatecontact->profile_image;
        $updatecontact->name=$request->name;
        $updatecontact->serve_since=$request->serve_since;
        $updatecontact->regd_no=$request->regd_no;
        $updatecontact->phone=$request->phone;
        $updatecontact->address=$request->address;
        $updatecontact->email=$request->email;
        $updatecontact->fax=$request->fax;
        $updatecontact->gpo_box=$request->gpo_box;
        $updatecontact->map_url=$request->map_url;
        $updatecontact->mobile=$request->mobile;
        $updatecontact->save();

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

    // pagebanner
    public function pagebannerView()
    {
        $pagebanner=PageBanner::orderBy('id','desc')->get();
        return view('admin.sitesetting.pagebanner.pagebanner',compact('pagebanner'));
    }
    public function pagebannerStore(Request $request)
    {
        $request->validate([
            'page_banner'=>'required',
            'page_name'=>'required',
        ]);
        $data=$request->except('_token');
        PageBanner::create($data);
        $notification=array(
            'message'=>'Page Banner Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.pagebanner')->with($notification);
    }
     
    public function pageBannerEdit($id)
    {
        $editpagebanner=PageBanner::findOrFail($id);
        return view('admin.sitesetting.pagebanner.edit',compact('editpagebanner'));
    }

    public function pageBannerUpdate(Request $request,$id)
    {
        $request->validate([
            'page_name'=>'required',
        ]);
        $updatepagebanner=PageBanner::findOrFail($id);
        if($request->page_banner){
            $updatepagebanner->page_banner=$request->page_banner;
            $updatepagebanner->page_name=$request->page_name;
            $updatepagebanner->save();
        }
        else{
            $updatepagebanner->page_name=$request->page_name;
            $updatepagebanner->save();
        }
        $notification=array(
            'message'=>'Page Banner Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.pagebanner')->with($notification);
    }
    public function pageBannerDelete($id)
    {
        $pagebanner=PageBanner::findOrFail($id);
        $pagebanner->delete();
        $notification=array(
            'message'=>'Page Banner Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

}
