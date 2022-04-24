<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Hash;
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
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'admin_type'=>'admin',
            'password'=>Hash::make('password') //password
        ];
    }
}
