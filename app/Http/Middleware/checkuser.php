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
        $role = $request->user()->role_id;
        $studentId = $request->user()->student_id;
        if ($role == null) {
            return response() -> json(['Khong co quyen dang nhap']);
        }
        else {
            switch ($role) {
                        case "4":
                            return $studentId != null ? redirect(route('dashboard.home')) : redirect(route('student.register'));
                            break;
                        case "1":
                            return redirect(route('dashboard.home'));
                            break;
                            }
                }
    }


}
