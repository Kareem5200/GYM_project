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

    public function changeStatusDepartment($department,$status){
        $department->update([
            'status'=>$status,
        ]);
        $department->trainers()->update([
            'status'=>$status,
        ]);

        $categories = $department->categories;
        foreach ($categories as $category) {
            $department->categories()->updateExistingPivot($category->id, ['status' => $status]);
        }

    }


    public function departments(){
        $departments = Department::whereStatus('active')->get();
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

        $categories = $department->categories()->withPivot('price')->wherePivot('status','active')->get();
        $trainers = $department->trainers()->whereStatus('active')->get(['id','name','image']);
        $equipments = $department->equipment()->get(['id','image']);

        return view('employees.admins.departments.displayDepartment',compact('department','categories','trainers','equipments'));

    }

    public function changeStatus(Department $department){
        if($department->status == 'active'){

            $this->changeStatusDepartment($department,'deactive');

        }else{

            $this->changeStatusDepartment($department,'active');
        }
        return to_route('employees.departments')->with('success','Department updated successfully');

    }

    public function deactivatedDepartment(){
        $departments = Department::whereStatus('deactive')->get();
        return view('employees.admins.departments.deactivatedDeaprtments',compact('departments'));
    }

    public function addEquipmentForDepartment(Department $department){
        $equipment= Equipment::whereDoesntHave('departments',function($query)use($department){
            $query->where('department_id',$department->id);
        })->get();

        $department_id=$department->id;
        return view('employees.admins.departments.addEquipmentForDepartment',compact('equipment','department_id'));

    }
    public function createEquipmentForDepartment(Request $request,Department $department){
        $validated = $request->validate([
            'equipment_id'=>['required','numeric'],
        ]);

        $department->equipment()->attach($request->equipment_id);
        return to_route('employees.displayDepartment',$department->id)->with('success','Equipment added successfullt');


    }

    public function removeEquipment(Department $department,$equipment_id){

        $department->detach($equipment_id);
        return to_route('employees.displayDepartment',$department->id)->with('success','Equipment removed successfully');

    }

}
