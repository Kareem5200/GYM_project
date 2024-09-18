<?php

namespace App\Http\Controllers\EmployeeControllers\AdminControllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Department;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequests\MembershipRequests\CreateRequest;
use App\Http\Requests\EmployeeRequests\MembershipRequests\UpdateRequest;
use Carbon\Carbon;

class MembershipsControllers extends Controller
{

    public function MembershipsWithoutTrainers(){

        $memberships = Membership::with(['department:id,name', 'user:id,name'])
        ->doesntHave('trainer')
        ->orderBy('end_date')
        ->get();


        return view('employees.admins.memberships.memberships',compact('memberships'));

    }

    public function addMembershipWithoutTrainer(){


        $departments = Department::whereStatus('active')->get(['id','name']);
        $categories  =Category::wherePlan('withoutPlans')->get();
        return  view('employees.admins.memberships.addMembership',compact('departments','categories'));
    }

    public function createMembershipWithoutTrainer(CreateRequest $request){
        $membership_exists = Membership::where(['user_id'=>$request->user_id,'department_id'=>$request->department_id])
                            ->activeMembership()->exists();

        if($membership_exists){
            return redirect()->back()->with('error','This user has active membership');
        }

        $category = Category::find($request->category_id);

        $end_date = date('Y-m-d', strtotime( "+".$category->category,strtotime($request->start_date)));
        $data = $request->all();
        $data['end_date'] =$end_date;

        Membership::create($data);
        return to_route('employees.MembershipsWithoutTrainers')->with('success','Membership created successfully');


    }


    public function updateMembershipWithoutTrainer($membership_id){
        $categories  =Category::wherePlan('withoutPlans')->get();
        return view('employees.admins.memberships.updateMembership',compact('categories','membership_id'));
    }
    public function editMembershipWithoutTrainer(UpdateRequest $request,Membership $membership){
        $category = Category::find($request->category_id);
        $end_date = date('Y-m-d',strtotime("+".$category->category,strtotime($request->start_date)));
        $data = $request->all();
        $data['end_date'] = $end_date ;
        $membership->update($data);
        return to_route('employees.MembershipsWithoutTrainers')->with('success','Membership updated successfully');

    }
}
