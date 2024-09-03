<?php

namespace App\Http\Controllers\EmployeeControllers;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EmployeeRequests\UpdateProfileRequest;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function editProfile(UpdateProfileRequest $request){

        $user= Employee::find(Auth::id());
        $validatedData = $request->validated();
        $originalData =['phone1'=>$user->phone1,'phone2'=>$user->phone2];
        $changedData = array_diff_assoc($validatedData,$originalData);

        if(empty($changedData)){

            return redirect()->back()->with('error','Has no changes');
        }

         $user->update($changedData);
         return to_route('employees.profile');




    }

    public function editPassword(UpdatePasswordRequest $request){

        $employee= Employee::find(Auth::id());
        if(Hash::check($request->old_password,$employee->password)){

            $employee->update(['password'=>Hash::make($request->password)]);
            Auth::guard('employees')->logout($employee);
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return to_route('employees.LoginForm');

        }
        return redirect()->back()->with('error','Wrong old password');

    }
}
