<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Rules\CheckAdminOldPassword;
use Hash;   

class ChangePasswordController extends Controller
{
    public function changePassword()
    {
        return view('admin.changepassword.changepassword');
    }
    public function changePasswordStore(Request $request)
    {
        $request->validate([
            'old_password' => ['required', new CheckAdminOldPassword],
            'new_password'=>'required|min:6|max:20',
            'confirm_password' => ['same:new_password']
        ]);
  
        User::find(Auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        $notification = array(
            'message' => 'Password Changed Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
}
