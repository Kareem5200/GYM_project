<?php

namespace App\Http\Controllers\EmployeeControllers\TrainerControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class NutrationController extends Controller
{
    public function usersWithoutPlans(){
        $users = User::withActiveMemberships()->categoryPlan('nutrationPlan')->withoutActivePlans('nutrationPlans')->get(['id','name','image','phone1','phone2']);
        return view('employees.trainers.nutrationPlan.nutClientsWithoutPlans',compact('users'));
    }

    public function usersWithPlans(){
        $users = User::withActiveMemberships()->categoryPlan('nutrationPlan')->withActivePlans('nutrationPlans')->get(['id','name','image','phone1','phone2']);
        return view('employees.trainers.nutrationPlan.nutClientsWithPlans',compact('users'));
    }
}
