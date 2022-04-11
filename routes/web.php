<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index']);

// admin 
Route::get('/country',[App\Http\Controllers\Admin\CountryController::class,'viewCountry'])->name('country.view');
Route::get('/country/create',[App\Http\Controllers\Admin\CountryController::class,'createCountry'])->name('country.create');

// frontend
Route::get('/',[App\Http\Controllers\User\IndexController::class,'homePage']);
