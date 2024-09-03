<?php

namespace App\Http\Controllers\EmployeeControllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipsControllers extends Controller
{

    public function MembershipsWithoutTrainers(){

        $memberships = Membership::with(['department:id,name','user:id,name','category:id,plan'])
        ->whereHas('user', function($query) {
            //User::query()->doesntHave('trainer');
            $query->doesntHave('trainers');
        })->get();


        dd($memberships);

    }
}
