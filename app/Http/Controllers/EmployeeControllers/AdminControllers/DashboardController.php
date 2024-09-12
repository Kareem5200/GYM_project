<?php

namespace App\Http\Controllers\EmployeeControllers\AdminControllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Membership;

class DashboardController extends Controller
{
    public function index(){


        $trainers_number = Employee::where(['type'=>'trainer','status'=>'active'])->count();
        $users_number = User::whereStatus('active')->count();
        $memberships = Membership::where('end_date','>=',now())->count();
        $departments = Department::whereStatus('active')->withCount('memberships')->get(['name']);
        $month_memberships = Membership::whereMonth('created_at','=',now()->month)->orWhere('updated_at','=',now()->month)->get();
        return view('employees.admins.dashboard',compact('trainers_number','memberships','users_number','month_memberships','departments'));
    }
}
