<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| employee Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/employees')->name('employees.')->group(function(){

    Route::middleware(['guest:employees','guest'])->group(function(){

        Route::get('/registerForm', [App\Http\Controllers\EmployeeControllers\AuthController::class,'registerForm'])->name('registerForm');
        Route::view('/loginForm', 'employees.Auth.login')->name('LoginForm');
    });

    Route::controller(App\Http\Controllers\EmployeeControllers\AuthController::class)->middleware(['guest:employees','guest'])->group(function(){

        Route::post('/register','register')->name('register');
        Route::post('/login','login')->name('login');

    });

    Route::middleware('auth:employees')->group(function(){

        Route::middleware('isAdmin')->group(function(){

              //Admins Routes

            Route::controller(App\Http\Controllers\EmployeeControllers\AdminControllers\DashboardController::class)
            ->group(function(){
                Route::get('/index','index')->name('index');
            });

            Route::controller(App\Http\Controllers\EmployeeControllers\AdminControllers\DepartmentController::class)
            ->group(function(){
                Route::get('/departments','departments')->name('departments');
                Route::view('/addDepartment','employees.admins.departments.addDepartment')->name('addDepartment');
                Route::post('/createDepartment','createDepartment')->name('createDepartment');
                Route::get('/updateDepartment/{department}','updateDepartment')->name('updateDepartment');
                Route::patch('/editDepartment/{department}','editDepartment')->name('editDepartment');
                Route::get('/displayDepartment/{department}','displayDepartment')->name('displayDepartment');
                // Route::view('/addEquipment/{department_id}','employees.admins.departments.equipment.addEquipment')->name('addEquipment');
            });

            Route::controller(App\Http\Controllers\EmployeeControllers\ProfileController::class)->group(function(){
                Route::view('/profile','employees.profile')->name('profile');
                Route::view('/updateProfile','employees.updateProfile')->name('updateProfile');
                Route::patch('/editProfile','editProfile')->name('editProfile');
                Route::view('/updatePassword','employees.updatePassword')->name('updatePassword');
                Route::patch('/editPassword','editPassword')->name('editPassword');

            });
            Route::controller(\App\Http\Controllers\EmployeeControllers\AdminControllers\CategoryController::class)->group(function(){
                Route::get('/categories','categories')->name('categories');
                Route::get('addCategory','addCategory')->name('addCategory');
                Route::post('createCategory','createCategory')->name('createCategory');
                Route::get('/categoryDepartments/{category}','categoryDepartments')->name('categoryDepartments');
                Route::put('/changeDepartmentStatus/{category}/{department_id}','changeDepartmentStatus')->name('changeDepartmentStatus');
                Route::view('updateCategoryPrice/{category_id}/{department_id}','employees.admins.categories.updateCategoryPrice')->name('updateCategoryPrice');
                Route::put('/editCategoryPrice/{category_id}/{department_id}','editCategoryPrice')->name('editCategoryPrice');

            });

            Route::controller(\App\Http\Controllers\EmployeeControllers\AdminControllers\AboutUsController::class)->group(function(){
                Route::get('/aboutUs','aboutUs')->name('aboutUs');
                Route::view('/addAboutUs','employees.admins.addAboutUs')->name('addAboutUs')->middleware('aboutUs');
                Route::post('/createAboutUs','createAboutUs')->name('createAboutUs');
                Route::get('/updateAboutUs/{aboutUs}','updateAboutUs')->name('updateAboutUs')->middleware('aboutUs');
                Route::patch('/editAboutUs/{aboutUs}','editAboutUs')->name('editAboutUs');
            });

            Route::controller(\App\Http\Controllers\EmployeeControllers\AdminControllers\MembershipsControllers::class)->group(function(){

                Route::get('/Memberships','MembershipsWithoutTrainers')->name('MembershipsWithoutTrainers');
                Route::get('/addMembership','addMembershipWithoutTrainer')->name('addMembershipWithoutTrainer');
                Route::post('/createMembership','createMembershipWithoutTrainer')->name('createMembershipWithoutTrainer');
                Route::get('/updateMembership/{membership_id}','updateMembershipWithoutTrainer')->name('updateMembershipWithoutTrainer');
                Route::patch('/editMembership/{membership}','editMembershipWithoutTrainer')->name('editMembershipWithoutTrainer');
            });
        });


        Route::middleware('isTrainer')->group(function(){

            //Trainer Routes
        });
    });

});

