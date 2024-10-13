<?php

namespace App\Http\Controllers\UserControllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class DepartmentController extends Controller
{

    public function displayDepartment(Department $department){
        $trainers = $department->trainers()->active()->get(['id','name','image']);
        $categories = $department->categories()->wherePlan('withoutPlans')->wherePivot('status','active')->withPivot('price')->get();
        return view('users.department.displayDepartment',compact('trainers','categories'));
    }


    public function aboutTrainer($trainer_id){

        $trainer = Employee::select(['id','phone1','phone2','email','department_id'])->with(['transformations','qualifications','department:id'])->find($trainer_id);
        $workout_categories = $trainer->department->categories()->wherePlan('workoutPlan')->wherePivot('status','active')->withPivot('price')->get();
        $nutration_categories = $trainer->department->categories()->wherePlan('nutrationPlan')->wherePivot('status','active')->withPivot('price')->get();
        return view('users.department.aboutTrainer',compact('trainer','workout_categories','nutration_categories'));



    }
}
