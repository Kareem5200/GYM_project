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
    Route::get('/',[App\Http\Controllers\UserControllers\WelcomeController::class,'index'])->middleware(['guest','guest:employees']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::view('/updateInbody','users.inbody')->name('updateInbody');
    Route::view('/profile','users.profile')->name('profile');
    Route::view('/memberships','users.memberships')->name('memberships');

    Route::controller(App\Http\Controllers\UserControllers\DepartmentController::class)->group(function(){
            Route::get('/displayDepartment/{department}','displayDepartment')->middleware('checkDepartment')->name('displayDepartment');
            Route::get('/aboutTrainer/{trainer_id}','aboutTrainer')->middleware('checkTrainer')->name('aboutTrainer');
    });


    Route::controller(App\Http\Controllers\UserControllers\UserController::class)->group(function(){
        Route::patch('/editInbody','editInbody')->name('editInbody');
    });








});




