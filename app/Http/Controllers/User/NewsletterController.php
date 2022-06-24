<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Newsletter;

class NewsletterController extends Controller
{
 
    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required|email'
        ]);
        if ( ! Newsletter::isSubscribed($request->email) ) 
        {
            Newsletter::subscribePending($request->email);
            return redirect()->back()->with('success', 'Thanks For Subscribe');
        }
        return redirect()->back()->with('failure', 'Sorry! You have already subscribed ');
            
    }
    public function contactMessage(Request $request)
    {
        $request->validate([
            'f_name'=>'required',
            'l_name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'country'=>'required',
            'message'=>'required',
        //    'g-recaptcha-response'=>'required|captcha'

        ]);
        \App\Models\ContactMessage::create($request->except('_token'));
        $notification = array(
            'message' => 'Thanks For Contact Us, We will contact you soon',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
