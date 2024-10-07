<?php

namespace App\Http\Controllers\EmployeeControllers\TrainerControllers;

use App\Models\User;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Models\NutrationPlan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TrainerRequests\NutrationPlanRequests\CreateRequest;
use App\Http\Requests\TrainerRequests\NutrationPlanRequests\UpdateRequest;

class NutrationController extends Controller
{
    public function usersWithoutPlans(){
        //Get users that have memberships with auth trainer but the trainer didnot add plan for them
        $users = User::withActiveMemberships()->categoryPlan('nutrationPlan')->withoutActivePlans('nutrationPlans')->select(['id','name','image','phone1','phone2'])->paginate();
        return view('employees.trainers.nutrationPlan.nutClientsWithoutPlans',compact('users'));
    }

    public function usersWithPlans(){
        //Get users that have memberships with auth trainer and the trainer added plan for them
        $users = User::withActiveMemberships()->categoryPlan('nutrationPlan')->withActivePlans('nutrationPlans')->select(['id','name','image','phone1','phone2'])->paginate();
        return view('employees.trainers.nutrationPlan.nutClientsWithPlans',compact('users'));
    }

    public function createNutrationPlan(CreateRequest $request,$user_id){
        $trainer_id = Auth::guard('employees')->id();

        //To cannot add the exists meal except snacks
        // if($request->meal != 'snacks'){
        //     $meal_exists = NutrationPlan::activeNutrationPlan()->where(['user_id'=>$user_id,'days'=>$request->days,'meal'=>$request->meal])->exists();
        //     if($meal_exists){
        //             return redirect()->back()->with('error','Meal exists');
        //     }
        // }

        //To check plan end date no be after membership date
        // $membership = Membership::where(['trainer_id'=> $trainer_id,'user_id'=>$user_id])->activeMembership()->category('nutrationPlan')->first();
        // if($request->end_date > $membership->end_date){
        //     return redirect()->back()->with('error','End date is after user membership end date');
        // }
        $request->merge([
            'user_id'=>$user_id,
            'trainer_id'=>$trainer_id,
        ]);

        NutrationPlan::create($request->all());
        return to_route('employees.displayNutrationPlans',$user_id)->with('success','Plan added successfully');
    }

    public function displayNutrationPlans($user_id){
        $plan_days = NutrationPlan::activeNutrationPlan()->where(['user_id'=>$user_id ,'trainer_id'=>auth()->guard('employees')->id()])->groupBy('days')->pluck('days');
        return view('employees.trainers.nutrationPlan.displayPlans',compact('plan_days','user_id'));
    }

    public function displayDayPlans($day,$user_id){
        $plans = NutrationPlan::activeNutrationPlan()->where(['user_id'=>$user_id,'days'=>$day,'trainer_id'=>auth()->guard('employees')->id()])->get();
        return view('employees.trainers.nutrationPlan.displayPlan',compact('plans'));
    }

    public function deleteDayPlans($day,$user_id){
        $plans = NutrationPlan::activeNutrationPlan()->where(['user_id'=>$user_id,'days'=>$day,'trainer_id'=>auth()->guard('employees')->id()])->delete();
        return to_route('employees.displayNutrationPlans',$user_id)->with('success',"$day plans deleted successfullt");
    }

    public function deleteNutrationPlan(NutrationPlan $nutration_plan){

        $nutration_plan->delete();
        return to_route('employees.displayDayPlans',[$nutration_plan->days,$nutration_plan->user_id])->with('success',"$nutration_plan->meal plan deleted successfullt");
    }
    public function updateNutrationPlan(NutrationPlan $nutration_plan){

        if($nutration_plan->trainer_id != auth()->guard('employees')->id() || $nutration_plan->end_date < now()){
            abort(403);
        }
        return view('employees.trainers.nutrationPlan.updatePlan',compact('nutration_plan'));


    }

    public function editNutrationPlan(UpdateRequest $request,NutrationPlan $nutration_plan){

        $data = array_filter($request->all(), function ($value) {
            return !is_null($value);
        });


        $nutration_plan->update($data);
        return to_route('employees.displayDayPlans',[$nutration_plan->days,$nutration_plan->user_id])->with('success','Plan updated successfully');





    }


}
