<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;

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

// auth
Route::get('/mountain-guide/login', [
    App\Http\Controllers\Auth\LoginController::class,
    'showLoginForm',
]);
Route::post('/mountain-guide/login', [
    App\Http\Controllers\Auth\LoginController::class,
    'login',
])->name('admin.login');



// forget password admin
Route::get('mountainguide/forget-password', [
    App\Http\Controllers\Auth\ForgotPasswordController::class,
    'showAdminForgetPasswordForm',
])->name('admin.forget.password.get');
Route::post('mountainguide/forget-password', [
    App\Http\Controllers\Auth\ForgotPasswordController::class,
    'submitAdminForgetPasswordForm',
])->name('admin.forget.password.post');
Route::get('mountainguide/reset-password/{token}', [
    App\Http\Controllers\Auth\ForgotPasswordController::class,
    'showAdminResetPasswordForm',
])->name('admin.reset.password.get');
Route::post('mountainguide/reset-password', [
    App\Http\Controllers\Auth\ForgotPasswordController::class,
    'submitAdminResetPasswordForm',
])->name('admin.reset.password.post');



/*************************************** admin route *********************************/
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [
        App\Http\Controllers\Admin\DashboardController::class,
        'index',
    ])->name('admin.dashboard');
    Route::get('/logout', [
        App\Http\Controllers\Auth\LoginController::class,
        'logout',
    ])->name('admin.logout');

   
    // change password
    Route::get('/change-password', [
        App\Http\Controllers\Admin\ChangePasswordController::class,
        'changePassword',
    ])->name('admin.change.password');
    Route::post('/change-password', [
        App\Http\Controllers\Admin\ChangePasswordController::class,
        'changePasswordStore',
    ])->name('admin.change.password.post');
    
    // user role and permission
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);

     // customers
    Route::get('/customers', [
        App\Http\Controllers\Admin\UserController::class,
        'viewCustomer',
    ])->name('all.customers');
    Route::get('/customers/delete/{id}', [
        App\Http\Controllers\Admin\UserController::class,
        'deleteCustomer',
    ])->name('customer.delete');
    // usermessage
    Route::get('/users-message', [
        App\Http\Controllers\Admin\UserController::class,
        'usersMessage',
    ])->name('all.usermessage');
    Route::get('/usermessage/delete/{id}', [
        App\Http\Controllers\Admin\UserController::class,
        'deleteUsermessage',
    ])->name('usermessage.delete');
    // country
    Route::prefix('country')->group(function () {
    Route::get('/view', [
        App\Http\Controllers\Admin\CountryController::class,
        'viewCountry',
    ])->name('country.view');
    Route::get('/create', [
        App\Http\Controllers\Admin\CountryController::class,
        'createCountry',
    ])->name('country.create');
    Route::post('/store', [
        App\Http\Controllers\Admin\CountryController::class,
        'storeCountry',
    ])->name('country.store');
    Route::get('/edit/{id}', [
        App\Http\Controllers\Admin\CountryController::class,
        'editCountry',
    ])->name('country.edit');
    Route::post('/update/{id}', [
        App\Http\Controllers\Admin\CountryController::class,
        'updateCountry',
    ])->name('country.update');
    Route::get('/delete/{id}', [
        App\Http\Controllers\Admin\CountryController::class,
        'deleteCountry',
    ])->name('country.delete');
    Route::get('/changeStatus', [
        App\Http\Controllers\Admin\CountryController::class,
        'changeStatus',
    ]);
    });

    // place
    Route::prefix('place')->group(function () {
    Route::get('/view', [
        App\Http\Controllers\Admin\PlaceController::class,
        'viewPlace',
    ])->name('place.view');
    Route::get('/create', [
        App\Http\Controllers\Admin\PlaceController::class,
        'createPlace',
    ])->name('place.create');
    Route::post('/store', [
        App\Http\Controllers\Admin\PlaceController::class,
        'storePlace',
    ])->name('place.store');
    Route::get('/edit/{id}', [
        App\Http\Controllers\Admin\PlaceController::class,
        'editPlace',
    ])->name('place.edit');
    Route::post('/update/{id}', [
        App\Http\Controllers\Admin\PlaceController::class,
        'updatePlace',
    ])->name('place.update');
    Route::get('/delete/{id}', [
        App\Http\Controllers\Admin\PlaceController::class,
        'deletePlace',
    ])->name('place.delete');
    Route::get('/changeStatus', [
        App\Http\Controllers\Admin\PlaceController::class,
        'changeStatus',
    ]);
    });


    /************* hotel **********/
    Route::prefix('hotel')->group(function () {
    Route::get('/view', [
        App\Http\Controllers\Admin\HotelController::class,
        'viewHotel',
    ])->name('hotel.view');
    Route::get('/details/{id}', [
        App\Http\Controllers\Admin\HotelController::class,
        'viewHotelDetails',
    ])->name('hotel.viewdetails');
    Route::get('/create', [
        App\Http\Controllers\Admin\HotelController::class,
        'createHotel',
    ])->name('hotel.create');
    Route::post('/store', [
        App\Http\Controllers\Admin\HotelController::class,
        'storeHotel',
    ])->name('hotel.store');
    Route::get('/edit/{id}', [
        App\Http\Controllers\Admin\HotelController::class,
        'editHotel',
    ])->name('hotel.edit');
    Route::post('/update/{id}', [
        App\Http\Controllers\Admin\HotelController::class,
        'updateHotel',
    ])->name('hotel.update');
    Route::get('/delete/{id}', [
        App\Http\Controllers\Admin\HotelController::class,
        'deleteHotel',
    ])->name('hotel.delete');
    Route::get('/changeHotelStatus', [
        App\Http\Controllers\Admin\HotelController::class,
        'changeHotelStatus',
    ]);
    });

    // blog
    Route::prefix('blog')->group(function () {
    Route::get('/view', [
        App\Http\Controllers\Admin\BlogController::class,
        'viewBlog',
    ])->name('blog.view');
    Route::get('/details/{id}', [
        App\Http\Controllers\Admin\BlogController::class,
        'viewBlogDetails',
    ])->name('blog.viewdetails');
    Route::get('/create', [
        App\Http\Controllers\Admin\BlogController::class,
        'createBlog',
    ])->name('blog.create');
    Route::post('/store', [
        App\Http\Controllers\Admin\BlogController::class,
        'storeBlog',
    ])->name('blog.store');
    Route::get('/edit/{id}', [
        App\Http\Controllers\Admin\BlogController::class,
        'editBlog',
    ])->name('blog.edit');
    Route::post('/update/{id}', [
        App\Http\Controllers\Admin\BlogController::class,
        'updateBlog',
    ])->name('blog.update');
    Route::get('/delete/{id}', [
        App\Http\Controllers\Admin\BlogController::class,
        'deleteBlog',
    ])->name('blog.delete');
    Route::get('/changeblogStatus', [
        App\Http\Controllers\Admin\BlogController::class,
        'changeBlogStatus',
    ]);

    });

   
    Route::get('/viewblog/comment', [
        App\Http\Controllers\Admin\BlogController::class,
        'viewBlogComment',
    ])->name('viewblog.comment');
    Route::get('/viewblog/commentdetails/{id}', [
        App\Http\Controllers\Admin\BlogController::class,
        'viewBlogCommentDetails',
    ])->name('blog.viewcommentdetails');
    Route::get('/delete/blogcomment/{id}', [
        App\Http\Controllers\Admin\BlogController::class,
        'deleteBlogComment',
    ])->name('blog.commentdelete');

    // Admin Category all route
    Route::prefix('category')->group(function () {
        Route::get('/view', [
            App\Http\Controllers\Admin\CategoryController::class,
            'CategoryView',
        ])->name('all.category');
        Route::post('/store', [
            App\Http\Controllers\Admin\CategoryController::class,
            'CategoryStore',
        ])->name('store.category');
        Route::get('/edit/{id}', [
            App\Http\Controllers\Admin\CategoryController::class,
            'CategoryEdit',
        ])->name('edit.category');
        Route::post('/update', [
            App\Http\Controllers\Admin\CategoryController::class,
            'CategoryUpdate',
        ])->name('update.category');
        Route::get('/delete/{id}', [
            App\Http\Controllers\Admin\CategoryController::class,
            'CategoryDelete',
        ])->name('delete.category');
    });

    //

    Route::get('/subcategory/ajax/{category_id}', [
        App\Http\Controllers\Admin\SubCategoryController::class,
        'GetSubCategory',
    ]);

    // Admin SubCategory all route
    Route::prefix('subcategory')->group(function () {
        Route::get('/view', [
            App\Http\Controllers\Admin\SubCategoryController::class,
            'SubCategoryView',
        ])->name('all.subcategory');
        Route::post('/store', [
            App\Http\Controllers\Admin\SubCategoryController::class,
            'SubCategoryStore',
        ])->name('store.subcategory');
        Route::get('/edit/{id}', [
            App\Http\Controllers\Admin\SubCategoryController::class,
            'SubCategoryEdit',
        ])->name('edit.subcategory');
        Route::post('/update', [
            App\Http\Controllers\Admin\SubCategoryController::class,
            'SubCategoryUpdate',
        ])->name('update.subcategory');
        Route::get('/delete/{id}', [
            App\Http\Controllers\Admin\SubCategoryController::class,
            'SubCategoryDelete',
        ])->name('delete.subcategory');
    });

    // tour place
 Route::prefix('tour')->group(function () {
    Route::get('/view', [
        App\Http\Controllers\Admin\TourController::class,
        'viewTour',
    ])->name('tour.view');
    // Route::get('/package',[App\Http\Controllers\Admin\TourController::class,'viewPackage'])->name('package.view');
    // Route::get('/activities',[App\Http\Controllers\Admin\TourController::class,'viewActivities'])->name('activities.view');
    Route::get('/viewdetails/{id}', [
        App\Http\Controllers\Admin\TourController::class,
        'viewDetailsTour',
    ])->name('tour.viewdetails');
    Route::get('/create', [
        App\Http\Controllers\Admin\TourController::class,
        'createTour',
    ])->name('tour.create');
    Route::post('/store', [
        App\Http\Controllers\Admin\TourController::class,
        'storeTour',
    ])->name('tour.store');
    Route::get('/edit/{id}', [
        App\Http\Controllers\Admin\TourController::class,
        'editTour',
    ])->name('tour.edit');
    Route::post('/update/{id}', [
        App\Http\Controllers\Admin\TourController::class,
        'updateTour',
    ])->name('tour.update');

    Route::post('/add-date-price/{id}', [
        App\Http\Controllers\Admin\TourController::class,
        'addDatePrice',
    ])->name('tour.dateprice');
    Route::get('/delete-dateprice/{id}', [
        App\Http\Controllers\Admin\TourController::class,
        'deleteDatePrice',
    ])->name('dateprice.delete');
    Route::post('/add-equipment/{id}', [
        App\Http\Controllers\Admin\TourController::class,
        'addEquipment',
    ])->name('tour.equipment');
    Route::get('/delete-equipment/{id}', [
        App\Http\Controllers\Admin\TourController::class,
        'deleteEquipment',
    ])->name('equipment.delete');
    Route::post('/add-itinery/{id}', [
        App\Http\Controllers\Admin\TourController::class,
        'addItinery',
    ])->name('tour.itineries');
    Route::get('/delete-itineries/{id}', [
        App\Http\Controllers\Admin\TourController::class,
        'deleteItineries',
    ])->name('itineries.delete');
    Route::post('/add-faq/{id}', [
        App\Http\Controllers\Admin\TourController::class,
        'addFaq',
    ])->name('tour.faq');
    Route::get('/delete-faq/{id}', [
        App\Http\Controllers\Admin\TourController::class,
        'deleteFaq',
    ])->name('faq.delete');

    Route::get('/softdelete/{id}', [
        App\Http\Controllers\Admin\TourController::class,
        'softDeleteTour',
    ])->name('tour.softdelete');
    Route::get('tour/trashed', [
        App\Http\Controllers\Admin\TourController::class,
        'getTrashedTour',
    ])->name('viewtour.trashed');
    Route::get('tour/packagetrashed', [
        App\Http\Controllers\Admin\TourController::class,
        'getTrashedPackage',
    ])->name('viewpackage.trashed');
    Route::get('tour/activitiestrashed', [
        App\Http\Controllers\Admin\TourController::class,
        'getTrashedActivities',
    ])->name('viewactivities.trashed');
    Route::get('tour/restore/{id}', [
        App\Http\Controllers\Admin\TourController::class,
        'restoreTour',
    ])->name('tour.restore');
    Route::get('tour/delete/{id}', [
        App\Http\Controllers\Admin\TourController::class,
        'deleteTour',
    ])->name('tour.delete');

    Route::get('/changeStatus', [
        App\Http\Controllers\Admin\TourController::class,
        'changeStatus',
    ]);
});
    Route::get('/place/ajax/{category_id}', [
        App\Http\Controllers\Admin\TourController::class,
        'getPlace',
    ]);

    // coupon
    Route::prefix('coupon')->group(function(){
    Route::get('/view', [
        App\Http\Controllers\Admin\CouponController::class,
        'viewCoupon',
    ])->name('coupon.view');
    Route::post('/store', [
        App\Http\Controllers\Admin\CouponController::class,
        'storeCoupon',
    ])->name('coupon.store');
    Route::get('/edit/{id}', [
        App\Http\Controllers\Admin\CouponController::class,
        'editCoupon',
    ])->name('coupon.edit');
    Route::post('/update}', [
        App\Http\Controllers\Admin\CouponController::class,
        'updateCoupon',
    ])->name('coupon.update');
    Route::get('/delete/{id}', [
        App\Http\Controllers\Admin\CouponController::class,
        'deleteCoupon',
    ])->name('coupon.delete');
    Route::get('/changeStatus', [
        App\Http\Controllers\Admin\CouponController::class,
        'changeStatus',
    ]);
});

    // Admin Banner all route
    Route::prefix('banner')->group(function () {
        Route::get('/view', [
            App\Http\Controllers\Admin\BannerController::class,
            'BannerView',
        ])->name('all.banner');
        Route::post('/store', [
            App\Http\Controllers\Admin\BannerController::class,
            'BannerStore',
        ])->name('store.banner');
        Route::get('/edit/{id}', [
            App\Http\Controllers\Admin\BannerController::class,
            'BannerEdit',
        ])->name('edit.banner');
        Route::post('/update', [
            App\Http\Controllers\Admin\BannerController::class,
            'BannerUpdate',
        ])->name('update.banner');
        Route::get('/active/{id}', [
            App\Http\Controllers\Admin\BannerController::class,
            'BannerActive',
        ])->name('active.banner');
        Route::get('/inactive/{id}', [
            App\Http\Controllers\Admin\BannerController::class,
            'BannerInactive',
        ])->name('inactive.banner');
        Route::get('/delete/{id}', [
            App\Http\Controllers\Admin\BannerController::class,
            'BannerDelete',
        ])->name('delete.banner');
    });

    // Aboutus chooseus
    Route::prefix('aboutus')->group(function () {
        // introduction
        Route::get('/introduction', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'IntroductionView',
        ])->name('all.introduction');
        Route::get('/introduction/view/{id}', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'IntroductionDetails',
        ])->name('view.introduction');
        Route::post('/introduction/store', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'IntroductionStore',
        ])->name('store.introduction');
        Route::get('/introduction/edit/{id}', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'IntroductionEdit',
        ])->name('edit.introduction');
        Route::post('/introduction/update/{id}', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'IntroductionUpdate',
        ])->name('update.introduction');
        Route::get('/introduction/delete/{id}', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'IntroductionDelete',
        ])->name('delete.introduction');

        // termsandconditions
        Route::get('/termsandconditions', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'TermsView',
        ])->name('all.termsandconditions');
        Route::get('/termsandconditions/view/{id}', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'TermsDetails',
        ])->name('view.termsandconditions');
        Route::post('/termsandconditions/store', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'TermsStore',
        ])->name('store.termsandconditions');
        Route::get('/termsandconditions/edit/{id}', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'TermsEdit',
        ])->name('edit.termsandconditions');
        Route::post('/termsandconditions/update/{id}', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'TermsUpdate',
        ])->name('update.termsandconditions');
        Route::get('/termsandconditions/delete/{id}', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'TermsDelete',
        ])->name('delete.termsandconditions');

        Route::get('/chooseus', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'ChooseView',
        ])->name('all.choose');
        Route::post('/chooseus/store', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'ChooseStore',
        ])->name('store.choose');
        Route::get('/chooseus/edit/{id}', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'ChooseEdit',
        ])->name('edit.choose');
        Route::post('/chooseus/update/{id}', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'ChooseUpdate',
        ])->name('update.choose');
        Route::get('/chooseus/delete/{id}', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'ChooseDelete',
        ])->name('delete.choose');

        // our team
        Route::get('/all/ourteam', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'TeamView',
        ])->name('all.team');
        Route::get('/ourteam/create', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'TeamCreate',
        ])->name('create.team');
        Route::post('/ourteam/store', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'TeamStore',
        ])->name('store.team');
        Route::get('/ourteam/view/{id}', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'TeamView',
        ])->name('view.team');
        Route::get('/ourteam/edit/{id}', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'TeamEdit',
        ])->name('edit.team');
        Route::post('/ourteam/update/{id}', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'TeamUpdate',
        ])->name('update.team');
        Route::get('/ourteam/delete/{id}', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'TeamDelete',
        ])->name('delete.team');
        Route::get('/ourteam/changeStatus', [
            App\Http\Controllers\Admin\AboutUsController::class,
            'TeamChangeStatus',
        ]);
    });

    // Admin testomonial all route
    Route::prefix('testmonial')->group(function () {
        Route::get('/view', [
            App\Http\Controllers\Admin\TestmonialController::class,
            'TestmonialView',
        ])->name('all.testmonial');
        Route::post('/store', [
            App\Http\Controllers\Admin\TestmonialController::class,
            'TestmonialStore',
        ])->name('store.testmonial');
        Route::get('/edit/{id}', [
            App\Http\Controllers\Admin\TestmonialController::class,
            'TestmonialEdit',
        ])->name('edit.testmonial');
        Route::post('/update', [
            App\Http\Controllers\Admin\TestmonialController::class,
            'TestmonialUpdate',
        ])->name('update.testmonial');
        Route::get('/active/{id}', [
            App\Http\Controllers\Admin\TestmonialController::class,
            'TestmonialActive',
        ])->name('active.testmonial');
        Route::get('/inactive/{id}', [
            App\Http\Controllers\Admin\TestmonialController::class,
            'TestmonialInactive',
        ])->name('inactive.testmonial');
        Route::get('/delete/{id}', [
            App\Http\Controllers\Admin\TestmonialController::class,
            'TestmonialDelete',
        ])->name('delete.testmonial');
    });

    // view booking all route
    Route::prefix('booking')->group(function () {
        Route::get('/viewbooking', [
            App\Http\Controllers\Admin\HotelController::class,
            'BookingView',
        ])->name('showbooking.view');
        Route::get('/viewbooking/details/{id}', [
            App\Http\Controllers\Admin\HotelController::class,
            'BookingViewDetails',
        ])->name('showbookingdetails');
        Route::get('booking/delete/{id}', [
            App\Http\Controllers\Admin\HotelController::class,
            'BookingDelete',
        ])->name('delete.booking');
    });

    Route::prefix('gallery')->group(function () {
        Route::get('/view', [
            App\Http\Controllers\Admin\GalleryController::class,
            'GalleryView',
        ])->name('all.gallery');
        Route::get('/view/details/{id}', [
            App\Http\Controllers\Admin\GalleryController::class,
            'GalleryDetails',
        ])->name('view.gallery');
        Route::post('/store', [
            App\Http\Controllers\Admin\GalleryController::class,
            'GalleryStore',
        ])->name('store.gallery');
        Route::get('/edit/{id}', [
            App\Http\Controllers\Admin\GalleryController::class,
            'GalleryEdit',
        ])->name('edit.gallery');
        Route::post('/update/{id}', [
            App\Http\Controllers\Admin\GalleryController::class,
            'GalleryUpdate',
        ])->name('update.gallery');
        Route::get('/delete/{id}', [
            App\Http\Controllers\Admin\GalleryController::class,
            'GalleryDelete',
        ])->name('delete.gallery');
    });

    Route::prefix('sitesetting')->group(function () {
        // logo
        Route::get('/logo', [
            App\Http\Controllers\Admin\SiteSettingController::class,
            'LogoView',
        ])->name('all.logo');
        Route::post('/store/logo', [
            App\Http\Controllers\Admin\SiteSettingController::class,
            'LogoStore',
        ])->name('store.logo');
        Route::get('/edit/logo/{id}', [
            App\Http\Controllers\Admin\SiteSettingController::class,
            'LogoEdit',
        ])->name('edit.logo');
        Route::post('/update/logo/{id}', [
            App\Http\Controllers\Admin\SiteSettingController::class,
            'LogoUpdate',
        ])->name('update.logo');
        Route::get('/delete/logo/{id}', [
            App\Http\Controllers\Admin\SiteSettingController::class,
            'LogoDelete',
        ])->name('delete.logo');

        Route::get('/contact', [
            App\Http\Controllers\Admin\SiteSettingController::class,
            'ContactView',
        ])->name('all.contact');
        Route::post('/store/contact', [
            App\Http\Controllers\Admin\SiteSettingController::class,
            'ContactStore',
        ])->name('store.contact');
        Route::get('/edit/contact/{id}', [
            App\Http\Controllers\Admin\SiteSettingController::class,
            'ContactEdit',
        ])->name('edit.contact');
        Route::post('/update/contact/{id}', [
            App\Http\Controllers\Admin\SiteSettingController::class,
            'ContactUpdate',
        ])->name('update.contact');
        Route::get('/delete/contact/{id}', [
            App\Http\Controllers\Admin\SiteSettingController::class,
            'ContactDelete',
        ])->name('delete.contact');
      
        // pageBanner
        Route::get('/pagebanner', [
            App\Http\Controllers\Admin\SiteSettingController::class,
            'pageBannerView',
        ])->name('all.pagebanner');
        Route::post('/store/pagebanner', [
            App\Http\Controllers\Admin\SiteSettingController::class,
            'pageBannerStore',
        ])->name('store.pagebanner');
    
        Route::post('/update/pagebanner/{id}', [
            App\Http\Controllers\Admin\SiteSettingController::class,
            'pageBannerUpdate',
        ])->name('update.pagebanner');
        Route::get('/delete/pagebanner/{id}', [
            App\Http\Controllers\Admin\SiteSettingController::class,
            'pageBannerDelete',
        ])->name('delete.pagebanner');
    });

    Route::group(['prefix' => '/mountainguide-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
    Route::group(['prefix' => 'tour/mountainguide-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
    Route::group(
        ['prefix' => 'country/mountainguide-filemanager'],
        function () {
            \UniSharp\LaravelFilemanager\Lfm::routes();
        }
    );
    Route::get('DatabaseNotificationsMarkasRead', function () {
        auth()
            ->user()
            ->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('databasenotifications.markasread');

    Route::get('/notification/date',[App\Http\Controllers\Admin\HotelController::class,'notificationDate']);
});

// forgot password

Route::get('forget-password', [
    App\Http\Controllers\Auth\ForgotPasswordController::class,
    'showForgetPasswordForm',
])->name('forget.password.get');
Route::post('forget-password', [
    App\Http\Controllers\Auth\ForgotPasswordController::class,
    'submitForgetPasswordForm',
])->name('forget.password.post');
Route::get('reset-password/{token}', [
    App\Http\Controllers\Auth\ForgotPasswordController::class,
    'showResetPasswordForm',
])->name('reset.password.get');
Route::post('reset-password', [
    App\Http\Controllers\Auth\ForgotPasswordController::class,
    'submitResetPasswordForm',
])->name('reset.password.post');

// frontend


// customer register/login
Route::get('customer-register', [
    App\Http\Controllers\Auth\CustomerController::class,
    'customerRegister',
])->name('customer.register');
Route::post('customer-store', [
    App\Http\Controllers\Auth\CustomerController::class,
    'customerStore',
])->name('customer.store');
Route::get('customer-loginform', [
    App\Http\Controllers\Auth\CustomerController::class,
    'customerLogin',
])->name('customer.login');
Route::post('customer-storeform', [
    App\Http\Controllers\Auth\CustomerController::class,
    'customerLoginStore',
])->name('customer-store.login');

//  google login
Route::get('/auth/google/customer', [
    App\Http\Controllers\Auth\CustomerController::class,
    'redirectToGoogles',
]);
Route::get('/auth/google/callback', [
    App\Http\Controllers\Auth\CustomerController::class,
    'handleCallbacks',
]);

// user dashboard
Route::group(['middleware' => 'customers'], function () {
    Route::get('customer-dashboard', [
        App\Http\Controllers\User\UserController::class,
        'CustomerDashboard',
    ])->name('customer.dashboard');
    Route::get('customer-logout', [
        App\Http\Controllers\Auth\CustomerController::class,
        'customerLogout',
    ])->name('customer.logout');
    // user image upload
    Route::post('customer-imageupload', [
        App\Http\Controllers\User\UserController::class,
        'ImageUpload',
    ])->name('image.store');
    Route::post('user/profile-update', [
        App\Http\Controllers\User\UserController::class,
        'ProfileUpdate',
    ])->name('user.profile.update');
    Route::post('user/change-password', [
        App\Http\Controllers\User\UserController::class,
        'ChangePassword',
    ])->name('user.change.password');
    Route::get('user/delete-booking/{id}', [
        App\Http\Controllers\User\UserController::class,
        'DeleteBooking',
    ])->name('user.delete.booking');
});

// frontend
Route::get('/', [
    App\Http\Controllers\User\IndexController::class,
    'homePage',
])->name('home');
Route::get('/countrydetails/{country_name}', [
    App\Http\Controllers\User\CountryController::class,
    'countryDetails',
])->name('countrydetails');
Route::get('/placedetails/{place_name}', [
    App\Http\Controllers\User\CountryController::class,
    'placeDetails',
])->name('placedetails');

Route::get('/tourdetails/{tour_name}', [
    App\Http\Controllers\User\IndexController::class,
    'tourDetails',
])->name('tourdetails');
Route::get('/tourmap/{tour_name}', [
    App\Http\Controllers\User\IndexController::class,
    'tourMap',
])->name('tourmap');
Route::get('/hotelviewdetails/{hotel_name}', [
    App\Http\Controllers\User\IndexController::class,
    'hotelviewDetails',
])->name('hotelviewdetails');
// subcategory related details
Route::get('/tripdetails/{slug_name}', [
    App\Http\Controllers\User\CategoryController::class,
    'tripDetails',
])->name('tripdetails');
Route::get('/booking/{tour_name}', [
    App\Http\Controllers\User\BookingController::class,
    'onlineBooking',
])->name('booking');
Route::post('/booking/store', [
    App\Http\Controllers\User\BookingController::class,
    'storeBooking',
])->name('store.booking');
// blogs
Route::get('/allblogs/', [
    App\Http\Controllers\User\BlogController::class,
    'allBlogs',
])->name('allblogs');
Route::get('/blogsdetails/{blog_title}', [
    App\Http\Controllers\User\BlogController::class,
    'blogsDetails',
])->name('blogsdetails');
Route::get('/searchblog', [
    App\Http\Controllers\User\BlogController::class,
    'searchBlog',
])->name('blogsearch');
Route::post('/storecomment', [
    App\Http\Controllers\User\BlogController::class,
    'storeComment',
])->name('blog.comment');

// newsletter

Route::post(
    'newsletter',
    'App\Http\Controllers\User\NewsletterController@store'
);
// user message
Route::get('/contact-us', function () {
    return view('frontend.contact.contact');
})->name('contactus');
Route::post('contact-us-message',[App\Http\Controllers\User\NewsletterController::class,'contactMessage'])->name('user.message');

// aboutus our team
Route::get('/ourteam', [
    App\Http\Controllers\User\AboutUsController::class,
    'allTeam',
])->name('ourteam');
Route::get('/introduction', [
    App\Http\Controllers\User\AboutUsController::class,
    'Introduction',
])->name('introduction');
// Route::get('/ourteam/details/{name}', [
//     App\Http\Controllers\User\AboutUsController::class,
//     'TeamDetails',
// ])->name('ourteam.details');
Route::get('/travel-with-us', [
    App\Http\Controllers\User\AboutUsController::class,
    'travelWithUs',
])->name('travelwithus');
Route::get('/terms-conditions', [
    App\Http\Controllers\User\AboutUsController::class,
    'TermsandCondition',
])->name('termsconditions');
Route::get('/privacy-policy', [
    App\Http\Controllers\User\AboutUsController::class,
    'PrivacyPolicy',
])->name('privacypolicy');
Route::get('/payment-method', [
    App\Http\Controllers\User\AboutUsController::class,
    'PaymentMethod',
])->name('paymentmethod');

// gallery
Route::get('/gallery', [
    App\Http\Controllers\User\GalleryController::class,
    'allGallery',
])->name('allgallery');
Route::get('/gallery/details/{gallery_title}', [
    App\Http\Controllers\User\GalleryController::class,
    'GalleryDetails',
])->name('gallery.details');



// search
Route::post('/tour-search', [
    App\Http\Controllers\User\SearchController::class,
    'tourSearch',
])->name('search');
