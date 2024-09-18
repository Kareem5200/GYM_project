<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkWorkoutUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user_id = $request->route('user_id');
        $user=User::find('user_id');

        if(!$user){
            abort(403);
        }

        $membership_exists = $user->whereHas('memberships',function($query){
            $query->where('trainer_id',Auth::guard('employees')->id())->where('end_date','>=',now());
        })->whereHas('memberships.category',function($query){
            $query->wherePlan('workoutPlan');
        })->exists();

        if(!$membership_exists){
            abort(403);
        }
        return $next($request);
    }
}
