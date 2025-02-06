<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HousesController;

/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "auth:api" middleware group. Now create something great!
|
*/

Route::middleware(['web'])->group(function() {
    Route::middleware(['auth'])->group(function() {
        Route::get( '/house/show/{id?}',    [HousesController::class, 'show'])->name('houseShow');
        Route::get( '/house/search',        [HousesController::class, 'search'])->name('houseSearch');
        Route::post('/house/store',         [HousesController::class, 'store'])->name('houseStore');
        Route::delete('/house/delete/{id}', [HousesController::class, 'delete'])->name('houseDelete');
        Route::get( '/users/search',        [AuthController::class, 'search'])->name('userSearch');
        Route::post('/user/store',          [AuthController::class, 'store'])->name('userStore');
        Route::delete('/user/delete/{id}',  [AuthController::class, 'delete'])->name('userDelete');
    });
});