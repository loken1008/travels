<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Hash;
use Auth;
use Socialite;

class CustomerController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except(['logout']);
    // }

  
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
            return redirect()->route('customer.dashboard');
        }
        $notofication = array(
            'message' => 'Email or Password is incorrect',
            'alert-type' => 'error'
        );

        return back()->with($notofication);
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

    // google login
    public function redirectToGoogles()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallbacks()
    {
        try {
     
            $user = Socialite::driver('google')->stateless()->user();
        //    dd($user);
            $finduser = Customer::where('provider_id', $user->id)->first();
      
            if($finduser){
      
                Auth::guard('customer')->login($finduser);
     
                return redirect('/customer-dashboard');
      
            }else{
                $newCustomer = Customer::create([
                    'first_name' => $user->user['given_name'],
                    'last_name' => $user->user['family_name'],
                    'email' => $user->user['email'],
                    'image'=>$user->user['picture'],
                    'provider_id'=> $user->id,
                    'provider'=> 'google',
                    'password' => encrypt('google'),
                ]);
     
                Auth::guard('customer')->login($newCustomer);
      
                return redirect('/customer-dashboard');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
