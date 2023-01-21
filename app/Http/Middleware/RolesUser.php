<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolesUser
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
        if (auth()->user()->role === "admin") {
            return redirect('/admin/dashboard');
        }elseif (auth()->user()->role==="guru") {
            return redirect('/guru/dashboard');
        }else{
            return redirect('/ortu/dashboard');
        }
    }
}
