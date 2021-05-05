<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class admin
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
        if(auth()->user()){
           if (auth()->user()->usertype == '0'){
              
           }else{
               return back();
           }
          
        }else{
            return route('login'); 

          
        } 
        return $next($request);
    }
}
