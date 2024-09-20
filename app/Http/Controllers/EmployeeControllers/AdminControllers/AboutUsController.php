<?php

namespace App\Http\Controllers\EmployeeControllers\AdminControllers;

use App\Models\Aboutus;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequests\AboutUsRequest;

class AboutUsController extends Controller
{
    public function aboutUs(){

        $aboutUs =Aboutus::first();
        return view('employees.admins.aboutUs',compact('aboutUs'));
    }

    public function createAboutUs(AboutUsRequest $request){

        Aboutus::create($request->all());
        return to_route('employees.aboutUs');
    }
    public function updateAboutUs(Aboutus $aboutUs){

        return view('employees.admins.updateAboutUs',compact('aboutUs'));

    }

    public function editAboutUs(AboutUsRequest $request,Aboutus $aboutUs){
        $validatedData = $request->validated();
        $originalData = $aboutUs->toArray();
        $changedData = array_diff_assoc($validatedData,$originalData);
        if(!empty($changedData)){
            $aboutUs->update($changedData);
        }
        return to_route('employees.aboutUs');

    }


}
