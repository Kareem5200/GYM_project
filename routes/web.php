<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([
    'prefix'=>LaravelLocalization::setLocale(), //localhost/en/......
    'middleware'=>['localeCookieRedirect','localizationRedirect'],
],function()
{

    Auth::routes();
    Route::get('/',[App\Http\Controllers\UserControllers\WelcomeController::class,'index']);


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');






});




