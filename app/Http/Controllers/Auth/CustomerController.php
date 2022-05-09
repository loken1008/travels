<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Hash;
use Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
    }

  
    public function customerRegister()
    {
        return view('auth.customer.register');
    }
    public function customerLogin()
    {
        return view('auth.customer.login');
    }

    public function customerLoginStore(Request $request)
    {
        $request->validate([
         'email'=>'required|email',
         'password'=>'required',
        ]);
        $remember_me = $request->has('remember_token') ? true : false;

        $user =Auth::guard('customer')->attempt(
            ['email' => $request->email, 'password' => $request->password],
            $remember_me
        );

        if ($user) {
            return redirect()->intended(route('customer.dashboard'));
        }

        return back()->with(['message' => 'Invalid Credentials!']);
    }

    public function customerStore(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email|unique:customers,email',
            'password'=>'required|min:6|max:20',
            'confirm_password'=>'required|same:password|min:6',
            'address'=>'required',
            'mobile'=>'required',
            'country'=>'required',
        ]);
        $hashPassword=Hash::make($request->password);
        $customer = Customer::create(
            array_merge($request->except('confirm_password'), ['password' => $hashPassword])
        );
        $notification=array(
            'message'=>'Account Created Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
    public function customerLogout()
    {
        Auth::guard('customer')->logout();
        return redirect('/');
    }
}
