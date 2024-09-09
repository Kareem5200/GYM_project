<?php

namespace App\Http\Controllers\EmployeeControllers\AdminControllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageTrainerControllers extends Controller
{
    public function getTrainerMemberships(Employee $employee){
       $users =$employee->users()->wherePivot('status','active')->get();
       foreach ($users as $user){

        $membership = $user->memberships()->where('department_id',$employee->department->id)
                           ->where('end_date','>=',now())->first();

        $user->category =  $membership->category->category;
        $user->plan =  $membership->category->plan;
        $user->end_date =  $membership->end_date;

        $nutplanExists =  $user->nutrationPlans()->where('trainer_id',$employee->id)->where('end_date','>=',now())->exists();
        if($nutplanExists){
            $user->nutPlanExists ='Done';
        }else{
            $user->nutPlanExists ='Not done';
        }

        $workoutplanExists =  $user->workoutPlans()->where('trainer_id',$employee->id)->where('end_date','>=',now())->exists();
        if($workoutplanExists){
            $user->workoutPlanExists ='Done';
        }else{
            $user->workoutPlanExists ='Not done';
        }

       }

       return view('employees.admins.trainers.displayMemberships',compact('employee','users'));
    }
}
