<?php

namespace App\Http\Controllers\EmployeeControllers;

use App\Helpers\CustomHelperFunctions;
use App\Models\Aboutus;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EmployeeRequests\LoginRequest;
use App\Http\Requests\EmployeeRequests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{

    //Function to store image in specific path
    //  static public function storeImage(object $input,string $path):string{

    //     $extension = $input->getClientOriginalExtension();
    //     $image_name = time().'.'.$extension;
    //     $path = public_path().$path;
    //     $input->move($path,$image_name);
    //     return  $image_name;
    // }

    //return register view
    public function registerForm(){
        $departments = Department::where('status','=','active')->get(['id','name']);
        return view('employees.Auth.register',compact('departments'));
    }

    //Make register logic
    public function register(RegisterRequest $request){


        $about_us = Aboutus::first(['admins_key','trainers_key']);
        $data = $request->except('secret_key','image');

        if($about_us->admins_key == $request->secret_key){

            if(empty($request->department_id)){


                $data['image'] = CustomHelperFunctions::storeImage($request->image,'\images\employees_images/');
                $data['password']=Hash::make($data['password']);
                $employee = Employee::create($data);
                Auth::guard('employees')->login($employee);
                return to_route('employees.index');
            }

            return redirect()->back()->with('error','Must not select department if you admin');



        }elseif($about_us->trainers_key == $request->secret_key){

            if(!empty($request->department_id)){

                $data['image'] = CustomHelperFunctions::storeImage($request->image,'\images\employees_images/');
                $data['type']='trainer';
                $data['password']=Hash::make($data['password']);
                $employee = Employee::create($data);
                Auth::guard('employees')->login($employee);
                return to_route('employees.index');
            }

            return redirect()->back()->with('error','Must select department if you trainer');

        }else{

            return redirect()->back()->with('error','Error in secret key');
        }


    }


    //Make login logic
    public function login(LoginRequest $request){

        $employee =Employee::where(['email'=>$request->email,'status'=>'active'])->exists();

        if(!$employee){
            return redirect()->back()->with('error','Invalid credentials');
        }

        $remember_me = $request->has('remember_me');

        if(Auth::guard('employees')->attempt($request->only('email','password'),$remember_me)){

            if(Auth::guard('employees')->user()->type == 'admin'){

                return to_route('employees.index');

            }elseif(Auth::guard('employees')->user()->type == 'trainer'){

            }

        }

        return redirect()->back()->with('error','Invalid credentials');

    }
}
