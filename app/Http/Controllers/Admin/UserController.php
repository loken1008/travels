<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Hash;
use Illuminate\Support\Arr;
use DB;
use App\Models\Customer;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('admin.manage.manageuser.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.manage.manageuser.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user =User::create($input);
        $user->assignRole($request->input('roles'));
        $notification=array(
        'message'=>'Successfully User Inserted ',
        'alert-type'=>'success'
        );

        return redirect()->route('users.index')
                        ->with($notification);
    }
    public function show($id)
    {
        $user =User::find($id);
        return view('users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user =User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('admin.manage.manageuser.edit',compact('user','roles','userRole'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user =User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        $notification=array(
            'message'=>'Successfully User Updated ',
            'alert-type'=>'success'
            );
        return redirect()->route('users.index')
                        ->with($notification);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    User::find($id)->delete();
    $notification=array(
        'message'=>'Successfully User Deleted ',
        'alert-type'=>'success'
        );
        return redirect()->route('users.index')
                        ->with($notification);
    }

    public function viewCustomer()
        {
            $customers=Customer::orderBy('id','DESC')->get();
            return view('admin.customer.customer',compact('customers'));
        }
    public function deleteCustomer($id)
        {
            Customer::find($id)->delete();
            $notification=array(
                'message'=>'Successfully Customer Deleted ',
                'alert-type'=>'success'
                );
                return redirect()->back()
                                ->with($notification);
        }

    public function usersMessage()
    {
       $usermessage= \App\Models\ContactMessage::orderBy('id','DESC')->get();
        return view('admin.customer.usermessage',compact('usermessage'));
    }
    public function deleteUsermessage($id)
    {
        \App\Models\ContactMessage::find($id)->delete();
        $notification=array(
            'message'=>'Successfully User Message Deleted ',
            'alert-type'=>'success'
            );
            return redirect()->back()
                            ->with($notification);
    }
}
