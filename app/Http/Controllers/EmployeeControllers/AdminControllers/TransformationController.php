<?php

namespace App\Http\Controllers\EmployeeControllers\AdminControllers;

use App\Helpers\CustomHelperFunctions;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequests\CreateTransformationRequest;
use App\Models\Transformation;
use Illuminate\Http\Request;

class TransformationController extends Controller
{
    public function getTrainerTranformations($trainer_id){
        $transformations = Transformation::where('trainer_id',$trainer_id)->get();
        return view('employees.admins.trainers.displayTransformations',compact('transformations','trainer_id'));
    }

    public function createTransformation(CreateTransformationRequest $request,$trainer_id){
        $data = $request->all();
        $data['image_before']=CustomHelperFunctions::storeImage($request->image_before,'\images\transformation\before_images/');
        $data['image_after']=CustomHelperFunctions::storeImage($request->image_after,'\images\transformation\after_images/');
        $data['trainer_id'] = $trainer_id;

        Transformation::create($data);
        return to_route('employees.getTrainerTranformations',$trainer_id)->with('success','Trainsformation added successfully');


    }
}
