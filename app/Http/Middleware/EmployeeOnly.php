<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EmployeeOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       if(!auth()->user()){
            return redirect('/login');
        }

        if(auth()->user()->role == "employee"){
            return $next($request);
        }else{
            return redirect()->back();
        }
       
    }
}