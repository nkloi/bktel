<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
class StudentRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */


    public function handle(Request $request, Closure $next )
    {

        if (Auth::check()){

            if (Auth::user()->role_id == '4'){

                return $next($request);
            }
            else{

                if (Auth::user()->role_id == '1'){

                    // return response()->json(' You are login with Admin Account! ');
                    // return redirect()->route('register');
                    return $next($request);

                }
                else{

                    // return response()->json('Login First');
                    return response()->json('Authorize Denied!');
                }

                // return response()->json('Login First');

            }
        }
        else
        {
            return response()->json('Login First');
        }
 

    }
}