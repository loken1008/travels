<?php

namespace App\Http\Controllers\Auth; 
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use DB; 
use Carbon\Carbon; 
use App\Models\Customer; 
use App\Models\User; 
use Mail; 
use Hash;
use Illuminate\Support\Str;
  
class ForgotPasswordController extends Controller
{
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgetPasswordForm()
      {
         return view('auth.customer.forgetPassword');
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:customers',
          ]);
  
          $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
  
          Mail::send('emails.forgetPassword', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });
          $notification=array(
              'message'=>'Please check your email to reset your password!',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) { 
         return view('auth.customer.forgetPasswordLink', ['token' => $token]);
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:customers',
              'password'=>'required|min:6|max:20',
            'confirm_password'=>'required|same:password|min:6',
          ]);
  
          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();
  
          if(!$updatePassword){
                $notification=array(
                    'message'=>'Invalid Token!',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
          }
  
          $user = Customer::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
 
          DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
            $notification=array(
                'message'=>'Password Reset Successfully!',
                'alert-type'=>'success'
            );
            return redirect()->route('customer.login')->with($notification);
      }



    //   admin
    public function showAdminForgetPasswordForm()
    {
       return view('auth.admin.adminforgetPassword');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitAdminForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);

        Mail::send('emails.adminforgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
       
          return redirect()->back()->with('message','Please check your email to reset your password!');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showAdminResetPasswordForm($token) { 
       return view('auth.admin.adminforgetPasswordLink', ['token' => $token]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitAdminResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password'=>'required|min:6|max:20',
          'confirm_password'=>'required|same:password|min:6',
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                              'email' => $request->email, 
                              'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
              $notification=array(
                  'message'=>'Invalid Token!',
                  'alert-type'=>'error'
              );
              return redirect()->back()->with($notification);
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();
          return redirect('/mountain-guide/login')->with('message','Password Reset Successfully!');
    }
}
