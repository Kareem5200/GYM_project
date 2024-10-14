<?php

namespace App\Http\Controllers\EmployeeControllers\TrainerControllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrainerRequests\WorkoutPlanRequests\CreateRequest;
use App\Http\Requests\TrainerRequests\WorkoutPlanRequests\UpdateRequest;
use App\Models\Membership;
use App\Models\WorkoutPlan;
use Illuminate\Support\Facades\Auth;

class WorkoutController extends Controller
{
    public function usersWithoutPlans(){

        $users = User::withoutActivePlans('workoutPlans')->withActiveMemberships()->categoryPlan('workoutPlan')->select(['id','name','image','phone1','phone2','inbody'])->paginate();
        return view('employees.trainers.workoutPlan.workClientsWithoutPlans',compact('users'));
    }

    public function usersWithPlans(){

        $users = User::withActivePlans('workoutPlans')->withActiveMemberships()->categoryPlan('workoutPlan')->select(['id','name','image','phone1','phone2','inbody'])->paginate();
        return view('employees.trainers.workoutPlan.workClientsWithPlans',compact('users'));

    }

    public function CreatePlan(CreateRequest $request,$user_id){
        // $trainer_id = Auth::guard('employees')->id();

        // //Check if plan exists
        // $plan_Exists = WorkoutPlan::where(['trainer_id'=> $trainer_id,'user_id'=>$user_id,'days'=>$request->days])
        //                 ->where('end_date','>=',now())->exists();

        // //To check the end date of plan not after the date of membership
        // $membership = Membership::where(['trainer_id'=> $trainer_id,'user_id'=>$user_id])->activeMembership()
        //                   ->category('workoutPlan')->first();


        // if($plan_Exists){
        //     return redirect()->back()->with('error','The user has plan at this day');
        // }


        // if($request->end_date > $membership->end_date){
        //     return redirect()->back()->with('error','End date is after user membership end date');
        // }

        $request->merge([
            'trainer_id'=>auth()->guard('employees')->id(),
            'user_id'=>$user_id,
        ]);

        WorkoutPlan::create($request->all());
        return to_route('employees.getUserWorkoutPlans',$user_id)->with('success','Plan addedd successfully');

    }

    public function getUserWorkoutPlans($user_id){
        $workout_plans = WorkoutPlan::userWorkoutPlans($user_id)->ActiveWorkoutPlan()->get();
        return view('employees.trainers.workoutPlan.displayPlans',compact('workout_plans'));
    }

    public function deleteWorkoutPlan(WorkoutPlan $workout_plan){
        $workout_plan->delete();
        return to_route('employees.getUserWorkoutPlans',$workout_plan->user_id)->with('success','Plan deleted successfully');
    }

    public function displayWorkoutPlan(WorkoutPlan $workout_plan){

        return view('employees.trainers.workoutPlan.displayPlan',compact('workout_plan'));
    }

    public function updateWorkoutPlan(WorkoutPlan $workout_plan){
        $plan = $workout_plan->plan;
        $id = $workout_plan->id;
        return view('employees.trainers.workoutPlan.updatePlan',compact('plan','id'));
    }

    public function editWorkoutPlan(UpdateRequest $request,WorkoutPlan $workout_plan){


        $data = array_filter($request->all(), function ($value) {
            return !is_null($value);
        });


        $workout_plan->update($data);
        return to_route('employees.getUserWorkoutPlans',$workout_plan->user_id)->with('success','Plan updated successfully');
    }









}
