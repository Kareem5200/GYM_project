<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\Aboutus;
use Symfony\Component\HttpFoundation\Response;

class AboutUsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $aboutUs = Aboutus::first(['id']);

        if($request->is('employees/addAboutUs')){

            if( $aboutUs ){
                abort(403);
            }

        }elseif($request->is('employees/updateAboutUs')){
            if( !$aboutUs ){
                            abort(403);
            }
        }
        return $next($request);
    }
}
