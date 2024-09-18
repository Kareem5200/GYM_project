<?php

namespace App\Http\Controllers\EmployeeControllers\TrainerControllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function trainerIndex(){

        $all_nutration_plan_memberships = Membership::where('trainer_id',Auth::guard('employees')->id())->where('end_date','>=',now())
                                        ->whereHas('category',function($query){
                                        $query->where('plan','nutrationPlan');
                                       })->count();

        $all_workout_plan_memberships = Membership::where('trainer_id',Auth::guard('employees')->id())->where('end_date','>=',now())
                                      ->whereHas('category',function($query){
                                      $query->where('plan','workoutPlan');
                                      })->count();


        $users_without_nutration_plan = Membership::where('trainer_id',Auth::guard('employees')->id())->where('end_date','>=',now())
                                    ->whereHas('user',function($query){
                                        $query->doesntHave('nutrationPlans');
                                    })
                                    ->whereHas('category',function($query){
                                        $query->where('plan','nutrationPlan');
                                    })
                                    ->count();

        $users_without_workout_plan = Membership::where('trainer_id',Auth::guard('employees')->id())->where('end_date','>=',now())
                                    ->whereHas('user',function($query){
                                        $query->doesntHave('workoutPlans');
                                    })
                                    ->whereHas('category',function($query){
                                        $query->where('plan','workoutPlan');
                                    })
                                    ->count();

        return view('employees.trainers.dashboard',compact('all_nutration_plan_memberships','all_workout_plan_memberships','users_without_nutration_plan','users_without_workout_plan'));

    }
}
