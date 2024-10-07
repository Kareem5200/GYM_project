<?php

namespace App\Http\Controllers\EmployeeControllers\AdminControllers;

use Exception;
use App\Models\User;
use App\Models\Employee;
use App\Models\WorkoutPlan;
use Illuminate\Http\Request;
use App\Models\NutrationPlan;
use App\Models\Qualification;
use Illuminate\Support\Facades\DB;
use App\Events\ActiveEmployeeEvent;
use App\Http\Controllers\Controller;
use App\Events\DeactiveEmployeeEvent;
use App\Events\DeactiveEmployeesEvent;
use App\Helpers\CustomHelperFunctions;
use App\Notifications\DeactiveEmployeesNotification;
use App\Http\Requests\TrainersRequests\CreateRequest;

class ManageTrainerControllers extends Controller
{
    public function getTrainerMemberships(Employee $trainer){

        $trainer_memberships = $trainer->memberships()->activeMembership()->with(['user:id,name', 'category'])->get();
        foreach($trainer_memberships as $membership){

            $nut_plan_exists = NutrationPlan::where(['trainer_id'=>$trainer->id,'user_id'=>$membership->user->id,])
                                            ->activeNutrationPlan()->exists();
            $work_plan_exists = WorkoutPlan::where(['trainer_id'=>$trainer->id,'user_id'=>$membership->user->id,])
                                            ->activeWorkoutPlan()->exists();
            if($nut_plan_exists){
                $membership->nut_plan_exists ='Done';
            }else{
                $membership->nut_plan_exists ='Not done';
            }

            if($work_plan_exists){
                $membership->work_plan_exists ='Done';
            }else{
                $membership->work_plan_exists ='Not done';
            }




        }

       return view('employees.admins.trainers.displayMemberships',compact('trainer_memberships'));
    }

    public function trainerProfile(Employee $trainer){
        return view('employees.admins.trainers.profile',compact('trainer'));
    }

    public function createQualification(CreateRequest $request,$trainer_id){

        $image_name = CustomHelperFunctions::storeImage($request->image,'\images\qualifications/');
        $data = $request->all();
        $data['image'] =  $image_name;
        $data['trainer_id'] = $trainer_id;
        Qualification::create($data);
        return to_route('employees.trainerProfile',$trainer_id)->with('success','Qualification added successfully');



    }

    public function deactivatedTrainers(){

        $trainers = Employee::where(['type'=>'trainer','status'=>'deactive'])->get();

        return view('employees.admins.trainers.deactivatedTariners',compact('trainers'));
    }

    public function  changeTrainerStatus(Employee $trainer){


        DB::beginTransaction();

        try{

            if($trainer->status == 'active'){
                $trainer->update([
                    'status'=>'deactive'
                ]);

                event(new DeactiveEmployeeEvent($trainer));

            }else{

                if($trainer->department->status == 'deactive'){
                    return redirect()->back()->with('error','The department of trainer is deactivated');
                }
                $trainer->update([
                    'status'=>'active'
                ]);
                
                event(new ActiveEmployeeEvent($trainer));

            }
            DB::commit();
        }catch(Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }


        return to_route('employees.displayDepartment',$trainer->department->id);


    }


}
