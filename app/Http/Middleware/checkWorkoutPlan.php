<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkWorkoutPlan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $workoutPlan = $request->route('workout_plan');
        
        if($workoutPlan->trainer_id != Auth::guard('employees')->id() || $workoutPlan->end_date < now()){
            abort(403);
        }
        return $next($request);
    }
}
