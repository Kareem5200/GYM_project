<?php

namespace App\Http\Middleware;

use App\Models\Employee;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkTrainer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if($trainer_id = $request->route('trainer_id')){
            $trainer = Employee::find($trainer_id);

        }else{
            $trainer = $request->route('trainer');
        }


        if(!$trainer || $trainer->status == 'deactive' || $trainer->department->status == 'deactive' ){
            abort(403);
        }

        return $next($request);
    }
}
