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
        Route::view('/loginForm', 'employees.Auth.login')->name('LoginForm');

    Route::controller(App\Http\Controllers\EmployeeControllers\AuthController::class)->group(function(){
            Route::get('/registerForm','registerForm')->name('registerForm');
            Route::post('/register','register')->name('register');
            Route::post('/login','login')->middleware('throttle:5,5')->name('login');

        });;
    });

    Route::middleware('auth:employees')->group(function(){

        Route::middleware('isAdmin')->group(function(){

              //Admins Routes

            Route::controller(App\Http\Controllers\EmployeeControllers\AdminControllers\DashboardController::class)->group(function(){
                Route::get('/index','index')->name('index');
            });


            Route::controller(App\Http\Controllers\EmployeeControllers\AdminControllers\DepartmentController::class)->group(function(){
                Route::middleware('checkDepartment')->group(function(){
                    Route::get('/updateDepartment/{department}','updateDepartment')->name('updateDepartment');
                    Route::patch('/editDepartment/{department}','editDepartment')->name('editDepartment');
                    Route::get('/displayDepartment/{department}','displayDepartment')->name('displayDepartment');
                    Route::get('/addEquipmentForDepartment/{department}','addEquipmentForDepartment')->name('addEquipmentForDepartment');
                    Route::post('/createEquipmentForDepartment/{department}','createEquipmentForDepartment')->name('createEquipmentForDepartment');
                    Route::delete('/removeEquipment/{department}/{equipment_id}','removeEquipment')->name('removeEquipment');
                });
                Route::patch('/changeStatus/{department}','changeStatus')->name('changeStatus');
                Route::get('/departments','departments')->name('departments');
                Route::view('/addDepartment','employees.admins.departments.addDepartment')->name('addDepartment');
                Route::post('/createDepartment','createDepartment')->name('createDepartment');
                Route::get('/deactivatedDepartment','deactivatedDepartment')->name('deactivatedDepartment');
            });


            Route::controller(App\Http\Controllers\EmployeeControllers\AdminControllers\ProfileController::class)->group(function(){
                Route::view('/profile','employees.profile')->name('profile');
                Route::view('/updateProfile','employees.updateProfile')->name('updateProfile');
                Route::patch('/editProfile','editProfile')->name('editProfile');
                Route::view('/updatePassword','employees.updatePassword')->name('updatePassword');
                Route::patch('/editPassword','editPassword')->name('editPassword');

            });
            Route::controller(\App\Http\Controllers\EmployeeControllers\AdminControllers\CategoryController::class)->group(function(){
                Route::get('/categories','categories')->name('categories');
                Route::get('/addCategory','addCategory')->name('addCategory');
                Route::post('/createCategory','createCategory')->name('createCategory');
                Route::get('/categoryDepartments/{category}','categoryDepartments')->name('categoryDepartments');
                Route::put('/changeDepartmentStatus/{category}/{department_id}','changeDepartmentStatus')->name('changeDepartmentStatus')->middleware('checkDepartment');
                Route::view('/updateCategoryPrice/{category_id}/{department_id}','employees.admins.categories.updateCategoryPrice')->name('updateCategoryPrice');
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

            Route::controller(\App\Http\Controllers\EmployeeControllers\AdminControllers\ManageTrainerControllers::class)->group(function(){
                Route::middleware('checkTrainer')->group(function(){
                    Route::get('/trainerProfileAdmin/{trainer}','trainerProfile')->name('trainerProfileAdmin');
                    Route::view('/addQualification/{trainer_id}','employees.admins.trainers.addQualification')->name('addQualification');
                    Route::post('/createQualification/{trainer_id}','createQualification')->name('createQualification');

                });
                Route::get('/getTrainerMemberships/{trainer}','getTrainerMemberships')->name('getTrainerMemberships');
                Route::get('/deactivatedTrainers','deactivatedTrainers')->name('deactivatedTrainers');
                Route::patch('/changeTrainerStatus/{trainer}','changeTrainerStatus')->name('changeTrainerStatus');

            });

            Route::controller(\App\Http\Controllers\EmployeeControllers\AdminControllers\EquipmentController::class)->group(function(){
                Route::get('/getEquipment','getEquipment')->name('getEquipment');
                Route::view('/updateEquipmentImage/{equipment_id}','employees.admins.departments.equipment.updateEquipmentImage')->name('updateEquipmentImage');
                Route::patch('/editEquipmentImage/{equipment_id}','editEquipmentImage')->name('editEquipmentImage');
                Route::view('/addEquipment','employees.admins.departments.equipment.addEquipment')->name('addEquipment');
                Route::post('/createEquipment','createEquipment')->name('createEquipment');
            });

            Route::controller(\App\Http\Controllers\EmployeeControllers\AdminControllers\TransformationController::class)->group(function(){
                Route::middleware('checkTrainer')->group(function(){

                    Route::get('/getTrainerTranformations/{trainer_id}','getTrainerTranformations')->name('getTrainerTranformations');
                    Route::view('/addTrainerTranformation/{trainer_id}','employees.admins.trainers.addTransformation')->name('addTrainerTranformation');
                    Route::post('/createTrainerTranformation/{trainer_id}','createTransformation')->name('createTrainerTranformation');

                });
            });
        });


        Route::middleware('isTrainer')->group(function(){

            //Trainer Routes

            Route::controller(\App\Http\Controllers\EmployeeControllers\TrainerControllers\DashboardController::class)->group(function(){
                Route::get('/trainerIndex','trainerIndex')->name('trainerIndex');
                Route::view('/trainerProfile','employees.trainers.profile')->name('trainerProfile');
                Route::view('/trainerQualifications','employees.trainers.qualifications')->name('trainerQualifications');
            });
            Route::controller(\App\Http\Controllers\EmployeeControllers\TrainerControllers\WorkoutController::class)->group(function(){
                Route::get('/workUsersWithoutPlans','usersWithoutPlans')->name('workUsersWithoutPlans');
                Route::get('/workUsersWithPlans','usersWithPlans')->name('workUsersWithPlans');
                Route::post('/createWorkoutPlan/{user_id}','CreatePlan')->name('createWorkoutPlan');
                Route::delete('/deleteWorkoutPlan/{workout_plan}','deleteWorkoutPlan')->name('deleteWorkoutPlan');
                Route::patch('/editWorkoutPlan/{workout_plan}','editWorkoutPlan')->name('editWorkoutPlan');

                Route::middleware('checkWorkoutPlan')->group(function(){
                    Route::get('/updateWorkoutPlan/{workout_plan}','updateWorkoutPlan')->name('updateWorkoutPlan');
                    Route::get('/displayWorkoutPlan/{workout_plan}','displayWorkoutPlan')->name('displayWorkoutPlan');

                });
                Route::middleware('checkWorkoutUser')->group(function(){
                    Route::view('/addWorkoutPlan/{user_id}','employees.trainers.workoutPlan.addPlan')->name('addWorkoutPlan');
                    Route::get('/getUserWorkoutPlans/{user_id}','getUserWorkoutPlans')->name('getUserWorkoutPlans');
                });
            });
            Route::controller(\App\Http\Controllers\EmployeeControllers\TrainerControllers\NutrationController::class)->group(function(){
                Route::get('/nutrationUsersWithoutPlans','usersWithoutPlans')->name('nutrationUsersWithoutPlans');
                Route::get('/nutrationUsersWithPlans','usersWithPlans')->name('nutrationUsersWithPlans');
                Route::post('/createNutrationPlan/{user_id}','createNutrationPlan')->name('createNutrationPlan');

                Route::delete('/deleteNutrationPlan/{nutration_plan}','deleteNutrationPlan')->name('deleteNutrationPlan');
                Route::get('/updateNutrationPlan/{nutration_plan}','updateNutrationPlan')->name('updateNutrationPlan');
                Route::patch('/editNutrationPlan/{nutration_plan}','editNutrationPlan')->name('editNutrationPlan');

                Route::middleware('checkNutrationPlan')->group(function(){
                    Route::view('/addNutrationPlan/{user_id}','employees.trainers.nutrationPlan.addPlan')->name('addNutrationPlan');
                    Route::get('/displayNutrationPlans/{user_id}','displayNutrationPlans')->name('displayNutrationPlans');
                    Route::get('/displayDayPlans/{day}/{user_id}','displayDayPlans')->name('displayDayPlans');
                    Route::delete('/deleteDayPlans/{day}/{user_id}','deleteDayPlans')->name('deleteDayPlans');
                });
            });
            Route::view('/transformations','employees.trainers.transformations')->name('transformations');

        });
    });

});

