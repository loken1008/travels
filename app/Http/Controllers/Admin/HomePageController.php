<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePage;
use Spatie\Sitemap\SitemapGenerator;

class HomePageController extends Controller
{

    public function homePage()
    {
        $homePage = HomePage::orderBy('id','desc')->get();
        return view('admin.homepage.viewhomepage', compact('homePage'));
    }
    public function homePageStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'main_image' => 'required',
            'image' => 'required',
            'img_alt' => 'required',
        ]);
        $homePage = new HomePage();
        $homePage->title = $request->title;
        $homePage->subtitle = $request->subtitle;
        $homePage->description = $request->description;
        $homePage->main_image = $request->main_image;
        $homePage->image = $request->image;
        $homePage->img_alt = $request->img_alt;
        $homePage->meta_title = $request->meta_title;
        $homePage->meta_description = $request->meta_description;
        $homePage->meta_keywords = $request->meta_keywords;
        $homePage->save();
        $notification=array(
            'messege'=>'Home Page Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function homePageEdit($id)
    {
        $edithomepage = HomePage::find($id);
        return view('admin.homepage.edit', compact('edithomepage'));
    }

    public function homePageUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'img_alt' => 'required',
        ]);
        $homePage = HomePage::find($id);
        $homePage->title = $request->title;
        $homePage->subtitle = $request->subtitle;
        $homePage->description = $request->description;
        $homePage->main_image = $request->main_image??$homePage->main_image;
        $homePage->image = $request->image??$homePage->image;
        $homePage->img_alt = $request->img_alt;
        $homePage->meta_title = $request->meta_title;
        $homePage->meta_description = $request->meta_description;
        $homePage->meta_keywords = $request->meta_keywords;
        $homePage->save();
        $notification=array(
            'messege'=>'Home Page Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function homePageDelete($id)
    {
        $homePage = HomePage::find($id);
        $homePage->delete();
        $notification=array(
            'messege'=>'Home Page Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function siteMap()
    {
    $path=public_path('sitemap.xml');
    SitemapGenerator::create('https://mountainguideinfo.com')->writeToFile($path);
    $notification=array(
        'message'=>'Sitemap Generated Successfully',
        'alert-type'=>'success'
    );
    return redirect()->route('admin.dashboard')->with($notification);
    }
}
