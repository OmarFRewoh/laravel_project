<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HousesController;

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

Route::middleware(['web'])->group(function() {
    Route::get( '/',               [AuthController::class, 'index'])->name('index');
    Route::get( '/login',          [AuthController::class, 'showLoginForm'])->name('showLogin');
    Route::post('/login',          [AuthController::class, 'login'])->name('login');
    Route::get( '/register',       [AuthController::class, 'showRegisterForm'])->name('showRegister');
    Route::post('/register',       [AuthController::class, 'register'])->name('register');
    Route::middleware(['auth'])->group(function() {
        Route::get( '/home',           [HousesController::class, 'show'])->name('home');
        Route::post('/logout',         [AuthController::class, 'logout'])->name('logout');
        Route::get('/admin',           [AuthController::class, 'admin'])->name('admin');

    });
});