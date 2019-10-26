<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $path = $request->path();
        
        
        if(Auth::guest() && $path != 'admin'){
            
            return redirect('admin/');
        }

        else if(Auth::check() && $path == 'admin'){
           return redirect()->route('users.index');
        }
        else{
             return $next($request);
        }
        
    }
}
