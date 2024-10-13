<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Equipment;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        return view('welcome');
    }
}
