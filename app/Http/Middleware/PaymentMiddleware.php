<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class PaymentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Validation before payment process

        //Get data from session for validation
        $plan = Session::get('plan');
        $category= Session::get('category');
        $trainer_id=Session::get('trainer_id');
        $department_id=Session::get('department_id');



        // if($plan == "withoutPlans"){

        //     $membership_exists = Membership::activeMembership()->where(['user_id'=>auth()->id(),'department_id'=>$department_id])
        //                         ->category($plan)->exists();

        // }elseif($plan == "workoutPlan"){
            //     $membership_exists = Membership::activeMembership()->where(['user_id'=>auth()->id(),'department_id'=>$department_id])
            //                         ->category("workoutPlan")->exists();


            // }elseif($plan == "nutrationPlan"){

            //     $membership_exists = Membership::activeMembership()->where('user_id',auth()->id())->category("nutrationPlan")->exists();

            // }


        //Validation process

        if($plan == "nutrationPlan"){
                $membership_exists = Membership::activeMembership()->where('user_id',auth()->id())->category("nutrationPlan")->exists();
        }else{
            $membership_exists = Membership::activeMembership()->where(['user_id'=>auth()->id(),'department_id'=>$department_id])
            ->category($plan)->exists();
        }

        if(is_null(auth()->user()->inbody) && ($plan == "nutrationPlan" || $plan == "workoutPlan" )){
            return redirect()->back()->with('paymentError',Lang::get('You must upload your inbody when make workout or nutration membership'));

        }


        if($membership_exists){
           return redirect()->back()->with('paymentError',Lang::get('You cannot not make membership please check your active memberships'));
        }


        return $next($request);
    }
}
