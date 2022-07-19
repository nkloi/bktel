<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('checkstudent')->name('home');
Route::get('/forms', [App\Http\Controllers\HomeController::class, 'forms'])->name('home.forms');
Route::get('/teacher_form', [App\Http\Controllers\HomeController::class, 'teacher_form'])->middleware('checkadmin')->name('home.teacher_form');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('student.admin');
Route::get('/teacher_import', [App\Http\Controllers\HomeController::class, 'teacher_import'])->middleware('checkadmin')->name('home.teacher_import');
Route::get('/student_import', [App\Http\Controllers\HomeController::class, 'student_import'])->middleware('checkadmin')->name('home.student_import');
Route::group(['prefix' => 'students'], function () {
	
	Route::get('/create', [App\Http\Controllers\StudentController::class, 'create'])->name('student.create');
	Route::get('/{id}', [App\Http\Controllers\StudentController::class, 'show'])->name('student.show');
	Route::post('/store', [App\Http\Controllers\StudentController::class, 'store'])->name('student.store');
	Route::any('update/{id}', [App\Http\Controllers\StudentController::class, 'update'])->name('student.update');
	Route::get('/edit/{id}', [App\Http\Controllers\StudentController::class, 'edit'])->name('student.edit');
	Route::get('delete/{id}', [App\Http\Controllers\StudentController::class, 'delete'])->name('student.delete');
	Route::post('/upload', [App\Http\Controllers\StudentController::class, 'upload'])->name('student.upload');
});

Route::group(['prefix' => 'teachers'], function() {
	Route::post('/store', [App\Http\Controllers\TeacherController::class, 'store'])->name('teacher.store');
	Route::post('/upload', [App\Http\Controllers\TeacherController::class, 'upload'])->name('teacher.upload');
});

