<?php

namespace App\Http\Middleware;

use App\Models\Department;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkDepartment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->has('department_id')){

            $department=Department::find($request->route('department_id'));

        }else{

            $department = $request->route('department');
        }

        if(!$department || $department->status == 'deactive'){

            abort(403);
        }
        return $next($request);
    }
}
