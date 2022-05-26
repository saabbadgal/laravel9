<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::controller(App\Http\Controllers\HomeController::class)->middleware('auth')->group(function(){
    
    Route::get('/home', 'index')->name('home');
    Route::post('/update-profile','updateProfile')->name('updateProfile');
    Route::post('/admin-all','adminAll')->name('adminAll');
});

Route::controller(App\Http\Controllers\GoogleAuthController::class)->group(function(){
    
    Route::get('auth/google', 'redirectToGoogle')->name('googleLogin');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});



 


