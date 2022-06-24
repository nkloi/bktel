<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class redirectAfterLogin
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

        $role = $request->user()->role->name;
        $studentId = $request->user()->student_id;
        switch ($role) {
            case "Student":
                return $studentId != null ? redirect(route('student.home')) : redirect(route('student.register'));
                break;
            case "Administrator":
                return redirect(route('dashboard.home'));
        }
    }
}
