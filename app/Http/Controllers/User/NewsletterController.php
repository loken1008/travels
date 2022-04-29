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
}
