<?php

namespace App\Http\Controllers\EmployeeControllers\TrainerControllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequests\TrainerRequests\WorkoutPlanRequests\CreateRequest;
use App\Models\Membership;
use App\Models\WorkoutPlan;
use Illuminate\Support\Facades\Auth;

class WorkoutController extends Controller
{
    public function usersWithoutPlans(){

        $users = User::withoutActivePlans('workoutPlans')->withActiveMemberships()->categoryPlan('workoutPlan')->get();
        return view('employees.trainers.workoutPlan.workClientsWithoutPlans',compact('users'));
    }

    public function usersWithPlans(){

        $users = User::withActivePlans('workoutPlans')->withActiveMemberships()->categoryPlan('workoutPlan')->get();
        return view('employees.trainers.workoutPlan.workClientsWithPlans',compact('users'));

    }

    public function CreatePlan(CreateRequest $request,$user_id){
        $trainer_id = Auth::guard('employees')->id();
        $plan_Exists = WorkoutPlan::where(['trainer_id'=> $trainer_id,'user_id'=>$user_id,'days'=>$request->days])
                        ->where('end_date','>=',now())->exists();

        $membership = Membership::where(['trainer_id'=> $trainer_id,'user_id'=>$user_id])->where('end_date','>=',now())
                          ->whereHas('category',function($query){
                            $query->wherePlan('workoutPlan');
                        })->first();

        $User_plans_exists = WorkoutPlan::where(['trainer_id'=> $trainer_id,'user_id'=>$user_id])->where('end_date','>=',now())->exists();

        if($plan_Exists){
            return redirect()->back()->with('error','The user has plan at this day');
        }


        if($request->end_date > $membership->end_date){
            return redirect()->back()->with('error','End date is after user membership end date');
        }

        if($User_plans_exists && Auth::guard('employees')->user()->status == 'deactive'){
            return redirect()->back()->with('error','Cannot add plan for this user becuase you are deactivated');
        }

        $request->merge([
            'trainer_id'=> $trainer_id,
            'user_id'=>$user_id,
        ]);

        WorkoutPlan::create($request->all());

    }









}
