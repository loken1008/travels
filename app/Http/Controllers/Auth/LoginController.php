<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Auth;
use Session;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
    }

  public function showLoginForm()
  {
      return view('auth.admin.login');
  }
  public function login(LoginRequest $request)
  {
      $remember_me = $request->has('remember_token') ? true : false;   
      $admin = Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember_me);
      if($admin) {
           return redirect('/dashboard');
      }

       return back()->with('error', 'Invalid Credentials!');
  }

  public function logout(){
    Session::flush();
    Auth::logout();
    return redirect('/mountain-guide/login');
}
}
