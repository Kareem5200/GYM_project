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

        $plan_with_same_trainer = NutrationPlan::activeNutrationPlan()->where('user_id',$user->id)
                                    ->where('trainer_id',Auth::guard('employees')->id())->exists();

        $membership_exists = $user->withActiveMemberships()->categoryPlan('nutrationPlan')
                            ->where('trainer_id',Auth::guard('employees')->id())->exists();

        if(!$plan_with_same_trainer || !$membership_exists ){
            abort(403);
        }
        return $next($request);
    }
}
