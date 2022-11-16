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
            $notification = array(
                'message' => 'Thanks For Subscribe Us, We will contact you soon',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        $notification = array(
            'message' => 'Sorry! You have already subscribed',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
            
    }
    public function contactMessage(Request $request)
    {
        $request->validate([
            'f_name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'country'=>'required',
            'message'=>'required',
           'g-recaptcha-response'=>'required|captcha'

        ]);
        \App\Models\ContactMessage::create($request->except('_token'));
        $notification = array(
            'message' => 'Thanks For Contact Us, We will contact you soon',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
