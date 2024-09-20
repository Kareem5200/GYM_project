<?php

namespace App\Http\Controllers\EmployeeControllers\TrainerControllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function trainerIndex(){

        $all_nutration_plan_memberships = Membership::where('trainer_id',Auth::guard('employees')->id())->activeMembership()
                                        ->category('nutrationPlan')->count();

        $all_workout_plan_memberships = Membership::where('trainer_id',Auth::guard('employees')->id())->activeMembership()
                                        ->category('workoutPlan')->count();


        $users_without_nutration_plan = Membership::where('trainer_id',Auth::guard('employees')->id())->activeMembership()
                                        ->whereHas('user',function($query){
                                            $query->doesntHave('nutrationPlans');
                                        })
                                        ->category('nutrationPlan')->count();

        $users_without_workout_plan = Membership::where('trainer_id',Auth::guard('employees')->id())->activeMembership()
                                        ->whereHas('user',function($query){
                                            $query->doesntHave('workoutPlans');
                                        })
                                        ->category('workoutPlans')->count();

        return view('employees.trainers.dashboard',compact('all_nutration_plan_memberships','all_workout_plan_memberships','users_without_nutration_plan','users_without_workout_plan'));

    }
}
