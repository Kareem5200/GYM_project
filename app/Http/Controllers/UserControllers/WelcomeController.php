<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Equipment;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){

        $departments = Department::active()->get();
        $equipment = Equipment::select('image')->paginate(2);
        return view('welcome',compact('departments','equipment'));
    }
}
