<?php

namespace App\Http\Controllers\EmployeeControllers\AdminControllers;

use App\Models\Equipment;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\DepartmentEquipment;
use App\Http\Controllers\Controller;

use App\Http\Controllers\EmployeeControllers\AuthController;
use App\Http\Requests\EmployeeRequests\DepartmentRequests\CreateRequest;
use App\Http\Requests\EmployeeRequests\DepartmentRequests\UpdateRequest;

class DepartmentController extends Controller
{
    public function departments(){
        $departments = Department::where('status','=','active')->get();
        return view('employees.admins.departments.departments',compact('departments'));
    }

    public function createDepartment(CreateRequest $request){

        $data = $request->all();
        $data['image'] = AuthController::storeImage($request->image,'\images\departments/');
        Department::create($data);
        return to_route('employees.departments')->with('success','Department added successfully');

    }

    public function updateDepartment(Department $department){

        return view('employees.admins.departments.updateDepartment',compact('department'));
    }


    public function editDepartment(UpdateRequest $request,Department $department){

        if($request->period == $department->period && empty($request->image)){

            return redirect()->back()->with('error','Has no changes');

        }elseif($request->period != $department->period && empty($request->image)){

            $department->update($request->all());
            return to_route('employees.departments')->with('success','Department updated successfully');

        }elseif($request->period == $department->period && !empty($request->image)){

            $data = $request->except('period');
            $data['image'] = AuthController::storeImage($request->image,'\images\departments/');
            $department->update($data);
            return to_route('employees.departments')->with('success','Department updated successfully');
        }

        $data = $request->all();
        $data['image'] = AuthController::storeImage($request->image,'\images\departments/');
        $department->update($data);
        return to_route('employees.departments')->with('success','Department updated successfully');

    }

    public function displayDepartment(Department $department){


        return view('employees.admins.departments.displayDepartment',compact('department'));

    }

    public function changeStatus(Department $department){
        if($department->status == 'active'){

            $department->update([
                'status'=>'deactive',
            ]);
            $department->trainers()->update([
                'status'=>'deactive',
            ]);

        }else{
            $department->update([
                'status'=>'active',
            ]);
            $department->trainers()->update([
                'status'=>'active',
            ]);
        }
        return to_route('employees.departments')->with('success','Department updated successfully');

    }

    public function deactivatedDepartment(){
        $departments = Department::where('status','deactive')->get();
        return view('employees.admins.departments.deactivatedDeaprtments',compact('departments'));
    }

}
