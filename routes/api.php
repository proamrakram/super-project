<?php

use App\Http\Controllers\AdminPanel\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::as('admin.')->prefix('admin')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::post('/store-user', 'store')->name('store.user');
        Route::post('/update-user', 'update')->name('update.user');
        Route::post('/delete-user', 'delete')->name('delete.user');
    });
});





