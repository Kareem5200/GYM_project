<?php

namespace App\Http\Controllers\EmployeeControllers\AdminControllers;

use Exception;
use App\Models\Equipment;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DepartmentEquipment;
use App\Events\ActiveEmployeesEvent;

use App\Http\Controllers\Controller;
use App\Events\DeactiveEmployeesEvent;
use App\Helpers\CustomHelperFunctions;
use App\Http\Controllers\EmployeeControllers\AuthController;
use App\Http\Requests\AdminRequests\DepartmentRequests\CreateRequest;
use App\Http\Requests\AdminRequests\DepartmentRequests\UpdateRequest;

class DepartmentController extends Controller
{

    protected function changeStatusDepartment($department,$status){
        $department->update([
            'status'=>$status,
        ]);

        $categories = $department->categories;
        foreach ($categories as $category) {
            $department->categories()->updateExistingPivot($category->id, ['status' => $status]);
        }

    }


    public function departments(){
        $departments = Department::active()->paginate(2);
        return view('employees.admins.departments.departments',compact('departments'));
    }

    public function createDepartment(CreateRequest $request){

        $data = $request->all();
        $data['image'] = CustomHelperFunctions::storeImage($request->image,'\images\departments/');
        Department::create($data);
        return to_route('employees.departments')->with('success','Department added successfully');

    }

    public function updateDepartment(Department $department){

        return view('employees.admins.departments.updateDepartment',compact('department'));
    }


    public function editDepartment(UpdateRequest $request,Department $department){

        if($request->period != $department->period && empty($this->image)){

            $department->update($request->all());
            return to_route('employees.departments')->with('success','Department updated successfully');

        }
        elseif($request->period == $department->period && !empty($request->image)){

            $data = $request->except('period');
            $data['image'] = CustomHelperFunctions::storeImage($request->image,'\images\departments/');
            $department->update($data);
            return to_route('employees.departments')->with('success','Department updated successfully');
        }

        $data = $request->all();
        $data['image'] = CustomHelperFunctions::storeImage($request->image,'\images\departments/');
        $department->update($data);
        return to_route('employees.departments')->with('success','Department updated successfully');

    }

    public function displayDepartment(Department $department){

        $categories = $department->categories()->withPivot('price')->wherePivot('status','active')->get();
        $trainers = $department->trainers()->active()->select(['id','name','image'])->paginate(4);
        $equipments = $department->equipment()->get(['id','image']);

        return view('employees.admins.departments.displayDepartment',compact('department','categories','trainers','equipments'));

    }

    public function changeStatus(Department $department){
        DB::beginTransaction();
        if($department->status == 'active'){

            try{
                $this->changeStatusDepartment($department,'deactive');

                $active_trainers = $department->trainers()->whereStatus('active');
                $active_trainers->update([
                    'status'=>'deactive',
                ]);

                $active_trainers = $active_trainers->get();
                event(new DeactiveEmployeesEvent($active_trainers));

                DB::commit();

            }catch(Exception $exception){

                DB::rollBack();

                return redirect()->back()->with('error',$exception->getMessage());
            }

        }else{

            try{

                $this->changeStatusDepartment($department,'active');
                DB::commit();
            }catch(Exception $exception){
                DB::rollBack();
                return redirect()->back()->with('error',$exception->getMessage());
            }
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
