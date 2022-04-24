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


// auth
// admin
Route::get('/admin/login',[App\Http\Controllers\Auth\LoginController::class,'showLoginForm']);
Route::post('/admin/login',[App\Http\Controllers\Auth\LoginController::class,'login'])->name('admin.login');
Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('admin.logout');

// admin 
// country
Route::get('/country',[App\Http\Controllers\Admin\CountryController::class,'viewCountry'])->name('country.view');
Route::get('/country/create',[App\Http\Controllers\Admin\CountryController::class,'createCountry'])->name('country.create');
Route::post('/country/store',[App\Http\Controllers\Admin\CountryController::class,'storeCountry'])->name('country.store');
Route::get('/country/edit/{id}',[App\Http\Controllers\Admin\CountryController::class,'editCountry'])->name('country.edit');
Route::post('/country/update/{id}',[App\Http\Controllers\Admin\CountryController::class,'updateCountry'])->name('country.update');
Route::get('/country/delete/{id}',[App\Http\Controllers\Admin\CountryController::class,'deleteCountry'])->name('country.delete');
Route::get('/country/changeStatus',[App\Http\Controllers\Admin\CountryController::class,'changeStatus']);

// Admin Category all route
Route::prefix('category')->group(function(){
    Route::get('/view',[App\Http\Controllers\Admin\CategoryController::class,'CategoryView'])->name('all.category');
    Route::post('/store',[App\Http\Controllers\Admin\CategoryController::class,'CategoryStore'])->name('store.category');
    Route::get('/edit/{id}',[App\Http\Controllers\Admin\CategoryController::class,'CategoryEdit'])->name('edit.category');
    Route::post('/update',[App\Http\Controllers\Admin\CategoryController::class,'CategoryUpdate'])->name('update.category');
    Route::get('/delete/{id}',[App\Http\Controllers\Admin\CategoryController::class,'CategoryDelete'])->name('delete.category');

});

// 

Route::get('/subcategory/ajax/{category_id}',[App\Http\Controllers\Admin\SubCategoryController::class,'GetSubCategory']);

// Admin SubCategory all route
Route::prefix('subcategory')->group(function(){
    Route::get('/view',[App\Http\Controllers\Admin\SubCategoryController::class,'SubCategoryView'])->name('all.subcategory');
    Route::post('/store',[App\Http\Controllers\Admin\SubCategoryController::class,'SubCategoryStore'])->name('store.subcategory');
    Route::get('/edit/{id}',[App\Http\Controllers\Admin\SubCategoryController::class,'SubCategoryEdit'])->name('edit.subcategory');
    Route::post('/update',[App\Http\Controllers\Admin\SubCategoryController::class,'SubCategoryUpdate'])->name('update.subcategory');
    Route::get('/delete/{id}',[App\Http\Controllers\Admin\SubCategoryController::class,'SubCategoryDelete'])->name('delete.subcategory');
});
// place
Route::get('/place',[App\Http\Controllers\Admin\PlaceController::class,'viewPlace'])->name('place.view');
Route::get('/place/create',[App\Http\Controllers\Admin\PlaceController::class,'createPlace'])->name('place.create');
Route::post('/place/store',[App\Http\Controllers\Admin\PlaceController::class,'storePlace'])->name('place.store');
Route::get('/place/edit/{id}',[App\Http\Controllers\Admin\PlaceController::class,'editPlace'])->name('place.edit');
Route::post('/place/update/{id}',[App\Http\Controllers\Admin\PlaceController::class,'updatePlace'])->name('place.update');
Route::get('/place/delete/{id}',[App\Http\Controllers\Admin\PlaceController::class,'deletePlace'])->name('place.delete');
Route::get('/place/changeStatus',[App\Http\Controllers\Admin\PlaceController::class,'changeStatus']);

// tour place
Route::get('/tour',[App\Http\Controllers\Admin\TourController::class,'viewTour'])->name('tour.view');
// Route::get('/package',[App\Http\Controllers\Admin\TourController::class,'viewPackage'])->name('package.view');
// Route::get('/activities',[App\Http\Controllers\Admin\TourController::class,'viewActivities'])->name('activities.view');
Route::get('/tour/viewdetails/{id}',[App\Http\Controllers\Admin\TourController::class,'viewDetailsTour'])->name('tour.viewdetails');
Route::get('/tour/create',[App\Http\Controllers\Admin\TourController::class,'createTour'])->name('tour.create');
Route::post('/tour/store',[App\Http\Controllers\Admin\TourController::class,'storeTour'])->name('tour.store');
Route::get('/tour/edit/{id}',[App\Http\Controllers\Admin\TourController::class,'editTour'])->name('tour.edit');
Route::post('/tour/update/{id}',[App\Http\Controllers\Admin\TourController::class,'updateTour'])->name('tour.update');
Route::get('/tour/softdelete/{id}',[App\Http\Controllers\Admin\TourController::class,'softDeleteTour'])->name('tour.softdelete');
Route::get('tour/trashed',[App\Http\Controllers\Admin\TourController::class,'getTrashedTour'])->name('viewtour.trashed');
Route::get('tour/packagetrashed',[App\Http\Controllers\Admin\TourController::class,'getTrashedPackage'])->name('viewpackage.trashed');
Route::get('tour/activitiestrashed',[App\Http\Controllers\Admin\TourController::class,'getTrashedActivities'])->name('viewactivities.trashed');
Route::get('tour/restore/{id}',[App\Http\Controllers\Admin\TourController::class,'restoreTour'])->name('tour.restore');
Route::get('tour/delete/{id}',[App\Http\Controllers\Admin\TourController::class,'deleteTour'])->name('tour.delete');


Route::get('/tour/changeStatus',[App\Http\Controllers\Admin\TourController::class,'changeStatus']);
Route::get('/tour/place/ajax/{category_id}',[App\Http\Controllers\Admin\TourController::class,'getPlace']);

// coupon
// place
Route::get('/coupon',[App\Http\Controllers\Admin\CouponController::class,'viewCoupon'])->name('coupon.view');
Route::post('/coupon/store',[App\Http\Controllers\Admin\CouponController::class,'storeCoupon'])->name('coupon.store');
Route::get('/coupon/edit/{id}',[App\Http\Controllers\Admin\CouponController::class,'editCoupon'])->name('coupon.edit');
Route::post('/coupon/update}',[App\Http\Controllers\Admin\CouponController::class,'updateCoupon'])->name('coupon.update');
Route::get('/coupon/delete/{id}',[App\Http\Controllers\Admin\CouponController::class,'deleteCoupon'])->name('coupon.delete');
Route::get('/coupon/changeStatus',[App\Http\Controllers\Admin\CouponController::class,'changeStatus']);

// Admin Banner all route
Route::prefix('banner')->group(function(){
    Route::get('/view',[App\Http\Controllers\Admin\BannerController::class,'BannerView'])->name('all.banner');
    Route::post('/store',[App\Http\Controllers\Admin\BannerController::class,'BannerStore'])->name('store.banner');
    Route::get('/edit/{id}',[App\Http\Controllers\Admin\BannerController::class,'BannerEdit'])->name('edit.banner');
    Route::post('/update',[App\Http\Controllers\Admin\BannerController::class,'BannerUpdate'])->name('update.banner');
    Route::get('/active/{id}',[App\Http\Controllers\Admin\BannerController::class,'BannerActive'])->name('active.banner');
    Route::get('/inactive/{id}',[App\Http\Controllers\Admin\BannerController::class,'BannerInactive'])->name('inactive.banner');
    Route::get('/delete/{id}',[App\Http\Controllers\Admin\BannerController::class,'BannerDelete'])->name('delete.banner');
});

// Admin Banner all route
Route::prefix('testmonial')->group(function(){
    Route::get('/view',[App\Http\Controllers\Admin\TestmonialController::class,'TestmonialView'])->name('all.testmonial');
    Route::post('/store',[App\Http\Controllers\Admin\TestmonialController::class,'TestmonialStore'])->name('store.testmonial');
    Route::get('/edit/{id}',[App\Http\Controllers\Admin\TestmonialController::class,'TestmonialEdit'])->name('edit.testmonial');
    Route::post('/update',[App\Http\Controllers\Admin\TestmonialController::class,'TestmonialUpdate'])->name('update.testmonial');
    Route::get('/active/{id}',[App\Http\Controllers\Admin\TestmonialController::class,'TestmonialActive'])->name('active.testmonial');
    Route::get('/inactive/{id}',[App\Http\Controllers\Admin\TestmonialController::class,'TestmonialInactive'])->name('inactive.testmonial');
    Route::get('/delete/{id}',[App\Http\Controllers\Admin\TestmonialController::class,'TestmonialDelete'])->name('delete.testmonial');
});


Route::group(['prefix' => '/laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::group(['prefix' => 'tour/laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::group(['prefix' => 'country/laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


// frontend
Route::get('/',[App\Http\Controllers\User\IndexController::class,'homePage'])->name('home');
Route::get('/countrydetails/{country_name}',[App\Http\Controllers\User\CountryController::class,'countryDetails'])->name('countrydetails');
Route::get('/tourdetails/{tour_name}',[App\Http\Controllers\User\IndexController::class,'tourDetails'])->name('tourdetails');

// subcategory related details
Route::get('/tripdetails/{slug_name}',[App\Http\Controllers\User\CategoryController::class,'tripDetails'])->name('tripdetails');


