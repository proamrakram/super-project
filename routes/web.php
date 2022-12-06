<?php

use App\Http\Controllers\AdminPanel\BranchController;
use App\Http\Controllers\AdminPanel\HomeController as AdminPanelHomeController;
use App\Http\Controllers\AdminPanel\ServiceController;
use App\Http\Controllers\AdminPanel\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use App\Http\Livewire\Branches;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/forget-password', [AdminPanelHomeController::class, 'forgetPassword'])->name('forget.password');
Route::post('/check-forget-password', [AdminPanelHomeController::class, 'checkForgetPassword'])->name('check.forget.password');
Route::post('/reset-password', [AdminPanelHomeController::class, 'resetPassword'])->name('reset.password');
Route::get('/page-reset-password/{user_id}', [AdminPanelHomeController::class, 'pageResetPassword'])->name('page.reset.password');

Route::get('/customer-order/usr-{user_id}', [AdminPanelHomeController::class, 'customerOrder'])->name('customer.order');



Route::controller(AdminPanelHomeController::class)->prefix('panel')->middleware(['auth', 'active'])->group(function () {

    Route::get('/home', 'home')->name('panel.home');
    Route::get('/order/{order}', 'order')->name('panel.order');
    Route::get('/new-user', 'newUser')->name('panel.new.user')->withoutMiddleware('active');
    Route::get('/profile', 'profile')->name('panel.profile');

    Route::as('panel.')->middleware('marketer')->group(function () {
        Route::get('/orders-marketer', 'ordersMarketer')->name('orders.marketer');
    });

    Route::as('panel.')->middleware('admin')->group(function () {
        Route::get('/users', 'users')->name('users');
        Route::get('/user/{user}', 'user')->name('user');
        Route::get('/offers', 'offers')->name('offers');
        Route::get('/orders', 'orders')->name('orders');
        Route::get('/customers', 'customers')->name('customers');
        Route::get('/selles', 'selles')->name('selles');
        Route::get('/branchs', 'branchs')->name('branchs');
        Route::get('/mediators', 'mediators')->name('mediators');
        Route::get('/sendSMS', 'sendSMS')->name('sendSMS');
        Route::get('/reservations', 'reservations')->name('reservations');
        Route::get('/real-estates-details', 'realEstatesDetails')->name('real.estates.details');

        Route::get('/change-password', 'changePassword')->name('change.password');
        Route::post('/update-password', 'updatePassword')->name('update.password');


        Route::get('/cities', 'cities')->name('cities');
        Route::get('/neighborhoods', 'neighborhoods')->name('neighborhoods');

        #Creating User Page
        Route::get('/create-user-info', 'createUserInfo')->name('create.user.info');
        Route::get('/create-user-permissions/{email}', 'createUserPermissions')->name('create.user.permissions');
        Route::get('/edit-user-info/{user}', 'editUserInfo')->name('edit.user.info');
        Route::get('/edit-user-permissions/{user}', 'editUserPermissions')->name('edit.user.permissions');

        #Creating Offer Page
        Route::get('/create-offer', 'createOffer')->name('create.offer');

        #Branch
        Route::get('/edit-branch/{branch}', 'editBranch')->name('edit.branch');
    });

    Route::as('admin.')->prefix('admin')->group(function () {

        Route::controller(UserController::class)->group(function () {
            #User
            Route::get('/change-user-status/{user}', 'changeUserStatus')->name('change.user.status');
            Route::post('/store-user-info', 'storeInfo')->name('store.user.info');
            Route::post('/update-user-info/{user}', 'updateInfo')->name('update.user.info');
            Route::post('/store-user-permissions', 'storeUserPermissions')->name('store.user.permissions');
            Route::post('/update-user-permissions/{user}', 'updateUserPermissions')->name('update.user.permissions');
        });

        Route::controller(ServiceController::class)->group(function () {

            Route::post('/store-customer', 'storeCustomer')->name('store.customer');
            Route::post('/update-customer/{id}', 'updateCustomer')->name('update.customer');
            Route::get('/change-customer-status/{customer}', 'changeCustomerStatus')->name('change.customer.status');


            Route::post('/store-branch', 'storeBranch')->name('store.branch');
            Route::post('/store-branch/{id}', 'editBranch')->name('edit.branch');
            Route::get('/change-branch-status/{branch}', 'changeBranchStatus')->name('change.branch.status');


            Route::post('/store-offer', 'storeOffer')->name('store.offer');
            Route::post('/store-city', 'StoreCity')->name('store.city');
            Route::post('/store-neighborhood', 'StoreNeighborhood')->name('store.neighborhood');
            Route::post('/store-property-type', 'storePropertyType')->name('store.property.type');
            Route::post('/store-property-status', 'storePropertyStatus')->name('store.property.status');
            Route::post('/store-offer-types', 'storeOfferTypes')->name('store.offer.types');
            Route::post('/store-price-types', 'storePriceTypes')->name('store.price.types');
            Route::post('/store-direction', 'storeDirection')->name('store.direction');
            Route::post('/store-street', 'storeStreet')->name('store.street');
            Route::post('/store-land-type', 'storeLandType')->name('store.land.type');
            Route::post('/store-licensed', 'storeLicensed')->name('store.licensed');
            Route::post('/store-land', 'storeLand')->name('store.land');
        });
    });
});
