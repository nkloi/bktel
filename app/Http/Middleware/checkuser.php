<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkuser
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
        if (Auth::check()){

            if (Auth::user()->role_id == '1')
            {
                return view('home');
            }
            else if (Auth::user() -> role_id == '4')
            {
                return view('auth.guest');
            }
            else if (Auth::user() -> role_id == '2')
            {

            return response()->json('Login First');
            }
            else{
                return response()->json('Login First');
            }


        }
    }
}
