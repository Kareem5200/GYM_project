<?php

namespace App\Http\Controllers\UserControllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\CustomHelperFunctions;
use App\Models\NutrationPlan;
use App\Models\WorkoutPlan;
use Illuminate\Validation\Rule;


class UserController extends Controller
{

    public function checkPlan($plan){
        if($plan->user != auth()->user() || $plan->end_date < now()->toDateString()){
            abort(403);
        }
    }

    public function getworkoutplans(){

        $workout_info = WorkoutPlan::activeWorkoutPlan()->where('user_id',auth()->id())->get(['id','days','muscle']);
        return view('users.Workout.workoutPlans',compact('workout_info'));
    }

    
    public function getworkoutPlan(WorkoutPlan $workout_plan){
        $this->checkPlan($workout_plan);
        return view('users.Workout.getWorkoutPlan',compact('workout_plan'));
    }

    public function getDaysOfNutration(){
        $nutration_days = NutrationPlan::activeNutrationPlan()->where('user_id',auth()->id())->groupBy('days')->get('days');
        return view('users.Nutration.daysOfNutration',compact('nutration_days'));
    }

    public function getMealsOfDay($day){
        $nutration_meals = NutrationPlan::activeNutrationPlan()->where(['days'=>$day,'user_id'=>auth()->id()])->get(['id','meal']);
        return view('users.Nutration.nutrationMeals',compact('nutration_meals'));
    }

    public function getNutrationPlan(NutrationPlan $nutration_plan){
        $this->checkPlan($nutration_plan);
        return view('users.Nutration.displayNutartionPlan',compact('nutration_plan'));
    }







    public function editInbody(Request $request){

        $request->validate([
            'inbody'=>['required','image','mimes:png,jpg,jpeg','max:2048']
        ]);


        $inbody = CustomHelperFunctions::storeImage(request()->file('inbody'),'\images\inbody/');
        $user = Auth::user();
        $user->update([
            'inbody'=>$inbody,
        ]);

        return to_route('profile');
    }


    public function editProfile(Request $request){
        $user = Auth::user();
        $request->validate([
            'phone1'=>['required','regex:/^01[0125][0-9]{8}$/', Rule::unique('users')->ignore($user->id),]
        ]);

        $user->update([
            'phone1'=>$request->phone1,
        ]);

        return to_route('profile');
    }
}
