<?php

namespace App\Http\Controllers\EmployeeControllers\AdminControllers;

use App\Helpers\CustomHelperFunctions;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequests\EquipmentRequests\CreateRequest;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function getEquipment(){
        $equipment = Equipment::all();
        return view('employees.admins.departments.equipment.getEquipment',compact('equipment'));
    }

    public function editEquipmentImage(Request $request,$equipment_id){
        $equipment = Equipment::find($equipment_id);
        if(!$equipment){
            return redirect()->back()->with('error','somthing wrong');
        }
        $request->validate([
            'image'=>['required','image','mimes:png,jpg,jpeg','max:2048'],
        ]);

        $data = $request->all();
        $data['image']=CustomHelperFunctions::storeImage($request->image,'\images\departments\equipment/');
        $equipment->update($data);
        return to_route('employees.getEquipment')->with('success','Equipment updated successfully');
    }

    public function createEquipment(CreateRequest $request){
        $data=$request->all();
        $data['image'] = CustomHelperFunctions::storeImage($request->image,'\images\departments\equipment/');
        Equipment::create($data);
        return to_route('employees.getEquipment')->with('success','Equipment added successfully');


    }
}
