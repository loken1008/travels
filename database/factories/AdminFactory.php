<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'admin_type'=>'admin',
            'password'=>Hash::make('password') //password
        ];
        $role = Role::create(['name' => 'Admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
