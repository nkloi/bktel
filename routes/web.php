<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 Route::get('/', function () {
     return view('welcome');
 });
Route::get('/login', function () {
    return view('login');
})->name('login');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::group(['prefix' => 'students'], function () {
	Route::get('/{student_id}', [StudentController::class,'show'])->name('student.show');
	Route::post('/',[StudentController::class,'store'])->name('student.store');
	Route::put('/{student_id}', [StudentController::class,'update'])->name('student.update');
	Route::delete('/{student_id}', [StudentController::class,'destroy'])->name('student.destroy');
	Route::any('/delete/{user_id}', [App\Http\Controllers\StudentsController::class, 'delete_user'])->name('user.destroy');
});

Route::get('/teacher', function () {
    return view('layouts.teacher');
});
Route::get('teacher_menu', [App\Http\Controllers\TeacherController::class, 'teacher_menu'])->name('get.teacher');
Route::post('add_teacher', [App\Http\Controllers\TeacherController::class, 'add_teacher'])->name('add.teacher');
Route::get('getstudent', [App\Http\Controllers\StudentsController::class, 'getstudent'])->name('get.student');
Route::get('information', [App\Http\Controllers\StudentsController::class, 'information'])->name('student.information');
Route::get('show_user', [App\Http\Controllers\StudentsController::class, 'show_user'])->name('show.user');
