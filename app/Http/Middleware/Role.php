<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role_id == 1){
            // return redirect('dashboardAdmin');
            return $next($request);
            // return $next($request);
            // dd(Auth::user());
        }else if(Auth::user()->role_id == 3){
             
            return redirect('/atlet');
         
        }else{
            return redirect('/pelatih');
        }
       
        
    }
}
