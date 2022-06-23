<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CheckStudent
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
        $current_userid = Auth::user()->id;
        $check = User::where('id', $current_userid)->get();
        if ($check[0]["student_id"] != NULL || $check[0]["role_id"] != 4) {
            return $next($request);
        } else {
            return redirect('/home/student_form');
        }
    }
}
