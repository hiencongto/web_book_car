<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TripDetailController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\CheckRoleAdmin;
use App\Http\Middleware\CheckRoleUser;
use App\Http\Middleware\CheckRoleDriver;


/*
 * ---------------------------------
 * GUESS ROUTE
 * ---------------------------------
 */
Route::prefix('')->group(function (){
//    Route::get('/', [UserController::class, 'customerHome'])->name('guess_home');
//    Route::post('/search', [TripController::class, 'searchTrip'])->name('search_guess_home');
});


/*
 * ----------------------------D-----
 * LOGIN LOGOUT REGISTER ROUTE
 * ---------------------------------
 */

Route::prefix('')->group(function () {
    Route::get('/', [UserController::class, 'customerHome'])->name('guess_home');

    Route::get('login', [UserController::class, 'showLogin'])->name('show_login');
    Route::post('login', [UserController::class, 'checkLogin']);
    Route::get('log-out',[UserController::class, 'userLogout'])->name('logout_user');

    Route::get('register', [UserController::class, 'showRegister'])->name('show_register');
    Route::post('register', [UserController::class, 'createUser']);

    Route::get('driver-register', [UserController::class, 'showDriverRegister'])->name('show_driver_register');
    Route::post('driver-register', [UserController::class, 'createUser']);

    Route::post('search', [TripController::class, 'searchTrip'])->name('search_guess_home');
    Route::get('list-trip', [TripController::class, 'showListTripsForCustomer'])->name('list_trip_guess');
    Route::get('trip-detail/{id}', [TripController::class, 'showTripDetail'])->name('show_trip_detail');
    Route::post('trip-detail/{id}', [TripDetailController::class, 'createTripDetail'])->name('create_trip_detail');
    Route::get('filter-trip', [TripController::class, 'filterTripForCustomer'])->name('filter_trip_guess');

    Route::get('confirm-email', [UserController::class, 'showConfirmEmail'])->name('show_confirm_email');

    Route::get('send-confirm-mail', [UserController::class, 'activeAccountByConfirmToken'])->name('active_account');
    Route::get('404-not-found', [HomeController::class, 'showPage404'])->name('page-404');

    Route::get('list-blog', [BlogController::class, 'listBlogForCustomer'])->name('list_blog_guesss');
    Route::get('blog-detail/{id}', [BlogController::class, 'blogDetailForCustomer'])->name('blog_detail_guess');

    Route::get('reset-password', [UserController::class, 'showResetPassword'])->name('reset_password');
    Route::post('reset-password', [UserController::class, 'resetPassword']);
    Route::get('form-new-password', [UserController::class, 'showFormNewPassword'])->name('form_new_pass');
    Route::post('form-new-password', [UserController::class, 'updateNewPassword']);

});
    Route::middleware(CheckLogin::class, CheckRoleUser::class)->prefix('customer')->group(function (){
        Route::get('home', [UserController::class, 'customerHome'])->name('customer_home');

        Route::get('order-success', [TripDetailController::class, 'showOrderSuccess'])->name('show_order_success');
        Route::get('payment-success', [TripDetailController::class, 'viewPayment'])->name('payment_success');

        Route::get('user-dashboard', [UserController::class, 'userDashboard'])->name('show_user_dashboard');
        Route::get('change-password', [UserController::class, 'showChangePassword'])->name('change_password');
        Route::post('change-password', [UserController::class, 'changePassword']);

        Route::get('log-out',[UserController::class, 'userLogout'])->name('logout_user');

        Route::get('test-delete', [TripDetailController::class, 'testDeleteSeat']);

        Route::post('customer-review',[CommentController::class, 'commentReview'])->name('comment-review');
    });


    Route::middleware(CheckLogin::class, CheckRoleAdmin::class)->prefix('admin')->group(function (){
//        Route::get('/', [UserController::class, 'adminHome'])->name('admin_home');

        // Quản lý user
        Route::get('list-users', [UserController::class, 'showListUsersForAdmin'])->name('list_user');
        Route::get('add-driver', [UserController::class, 'showAddDriverForAdmin'])->name('add_driver_admin');
        Route::post('add-driver', [UserController::class, 'createDriverForAdmin']);
        Route::get('update-user/{id}', [UserController::class, 'showUpdateUserForAdmin'])->name('update_user_admin');
        Route::post('update-user/{id}', [UserController::class, 'updateUserForAdmin']);
        Route::get('list-users-filter', [UserController::class, 'filterUserForAdmin'])->name('filter_user_admin');

        //Quản lý car
        Route::get('list-cars', [CarController::class, 'showListCarForAdmin'])->name('list_car');
        Route::get('add-car', [CarController::class, 'showAddCarForAdmin'])->name('add_car_admin');
        Route::post('add-car', [CarController::class, 'createCarForAdmin']);
        Route::get('update-car/{id}', [CarController::class, 'showUpdateCarForAdmin'])->name('update_car_admin');
        Route::post('update-car/{id}', [CarController::class, 'updateCarForAdmin']);

        //Quản lý trip
        Route::get('list-trips', [TripController::class, 'showListTripForAdmin'])->name('list_trip');
        Route::get('add-trip', [TripController::class, 'showAddTripForAdmin'])->name('add_trip_admin');
        Route::post('add-trip', [TripController::class, 'createTripForAdmin']);
        Route::get('check-schedule', [TripController::class, 'checkSchedule'])->name('check_schedule_admin');
        Route::get('edit-trip/{id}', [TripController::class, 'showTripEditForAdmin'])->name('edit_trip_admin');
        Route::post('edit-trip/{id}', [TripController::class, 'updateTripForAdmin']);
        Route::get('view-trip-detail/{id}', [TripController::class, 'viewTripDetailForAdmin'])->name('show_trip_detail_admin');
        Route::post('view-trip-detail/{id}');
        Route::get('cancel-customer-from-trip/{id}', [TripDetailController::class, 'cancelCustomerFromTrip'])->name('cancel_customer_from_trip');
        Route::get('list-trips-filter', [TripController::class, 'filterTripForAdmin'])->name('filter_trip_admin');

        //Blog
        Route::get('list-blogs', [BlogController::class, 'listBlogForAdmin'])->name('list_blog');
        Route::get('add-blog', [BlogController::class, 'showAddBlogForAdmin'])->name('add_blog_admin');
        Route::post('add-blog', [BlogController::class, 'addBlogForAdmin']);
        Route::get('edit-blog/{id}', [BlogController::class, 'showBlogEditForAdmin'])->name('edit_blog_admin');
        Route::post('edit-blog/{id}', [BlogController::class, 'updateBlogForAdmin']);
        Route::get('delete-blog/{id}', [BlogController::class, 'deleteBlogForAdmin'])->name('delete_blog_admin');

        Route::get('404-not-found-admin', [HomeController::class, 'showPage404Admin'])->name('page_404_admin');

        //Profile
        Route::get('admin-profile', [UserController::class, 'showProfileForAdmin'])->name('profile_admin');
        Route::post('admin-profile', [UserController::class, 'updateProfileAdmin']);
    });

    Route::middleware(CheckLogin::class, CheckRoleDriver::class)->prefix('driver')->group(function (){
        Route::get('list-trips', [TripController::class, 'listTripForDriver'])->name('list_trip_driver');
        Route::get('view-trip-detail/{id}', [TripController::class, 'viewTripDetailForDriver'])->name('show_trip_detail_driver');
        Route::get('start-trip/{id}',[TripController::class, 'startTrip'])->name('start_trip');
        Route::get('trip-processing', [TripController::class, 'showTripProcessingDriver'])->name('show_trio_process');
        Route::get('update-trip-detail-status/{id}/{key}', [TripDetailController::class, 'updateStatusForTripDetailForDriver'])->name('update_status_tripdetail_driver');
        Route::get('finish-trip-driver/{id}', [TripController::class, 'finishTripDriver'])->name('finish_trip');
        Route::get('list-trip-filter', [TripController::class, 'filterTripForDriver'])->name('filter_trip_driver');
        Route::get('driver-profile', [UserController::class, 'showProfileForDriver'])->name('profile_driver');
        Route::post('driver-profile', [UserController::class, 'updateProfileDriver']);
    });
