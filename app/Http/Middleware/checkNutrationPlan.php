<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\NutrationPlan;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkNutrationPlan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($user_id = $request->route('user_id')){
            $user = User::find($user_id);
        }else{
            $user = $request->route('user');
        }

        if(!$user){
            abort(403);
        }

        //To check id user not have plan with anither trainer
        $plan_with_another_trainer = NutrationPlan::activeNutrationPlan()->where('user_id',$user->id)
                                    ->where('trainer_id','!=',Auth::guard('employees')->id())->exists();

        //To check if user has active membership with nutartion category
        $membership_exists = $user->withActiveMemberships()->categoryPlan('nutrationPlan')->exists();

        if($plan_with_another_trainer || !$membership_exists ){
            abort(403);
        }
        return $next($request);
    }
}
