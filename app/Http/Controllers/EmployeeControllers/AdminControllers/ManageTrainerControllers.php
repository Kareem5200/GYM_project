<?php

namespace App\Http\Controllers\EmployeeControllers\AdminControllers;

use App\Helpers\CustomHelperFunctions;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequests\TrainersRequests\CreateRequest;
use App\Models\Qualification;

class ManageTrainerControllers extends Controller
{
    public function getTrainerMemberships(Employee $trainer){
       $users =$trainer->users()->wherePivot('status','active')->get();
       foreach ($users as $user){

        $membership = $user->memberships()->where('department_id',$trainer->department->id)
                           ->where('end_date','>=',now())->first();

        $user->category =  $membership->category->category;
        $user->plan =  $membership->category->plan;
        $user->end_date =  $membership->end_date;

        $nutplanExists =  $user->nutrationPlans()->where('trainer_id',$trainer->id)->where('end_date','>=',now())->exists();
        if($nutplanExists){
            $user->nutPlanExists ='Done';
        }else{
            $user->nutPlanExists ='Not done';
        }

        $workoutplanExists =  $user->workoutPlans()->where('trainer_id',$trainer->id)->where('end_date','>=',now())->exists();
        if($workoutplanExists){
            $user->workoutPlanExists ='Done';
        }else{
            $user->workoutPlanExists ='Not done';
        }

       }

       return view('employees.admins.trainers.displayMemberships',compact('trainer','users'));
    }

    public function trainerProfile(Employee $trainer){

        return view('employees.admins.trainers.profile',compact('trainer'));
    }

    public function createQualification(CreateRequest $request,$trainer_id){


        $qualification_exists = Qualification::where(['trainer_id'=>$trainer_id,'certification'=>$request->certification])->exists();

       if($qualification_exists){

            return redirect()->back()->with('error','Qualification exists');
       }

        $image_name = CustomHelperFunctions::storeImage($request->image,'\images\qualifications/');
        $data = $request->all();
        $data['image'] =  $image_name;
        $data['trainer_id'] = $trainer_id;
        Qualification::create($data);
        return to_route('employees.trainerProfile',$trainer_id)->with('success','Qualification added successfully');



    }


}
