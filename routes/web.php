<?php

use App\Http\Middleware\Authenticate;
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
Route::group(['prefix' => 'students'], function () {
    Route::get('/create', [App\Http\Controllers\StudentsController::class, 'create'])->name('student.create');
    Route::get('/{id}', [App\Http\Controllers\StudentsController::class, 'show'])->name('student.show');
    Route::post('/stored', [App\Http\Controllers\StudentsController::class, 'store'])->name('student.store');
    Route::post('update/{id}', [App\Http\Controllers\StudentsController::class, 'update'])->name('student.update');
    Route::get('/edit/{id}', [App\Http\Controllers\StudentsController::class, 'edit'])->name('student.edit');
    Route::any('/delete/{id}', [App\Http\Controllers\StudentsController::class, 'destroy'])->name('student.destroy');
});
Route::group(['prefix' => 'teachers'], function () {
Route::post('/stored', [App\Http\Controllers\TeachersController::class, 'store'])->name('teacher.store');
});

Route::get('/home/student_forms', [App\Http\Controllers\HomeController::class, 'student_forms'])->name('home.forms');
Route::get('/home/teacher_forms', [App\Http\Controllers\HomeController::class, 'teacher_forms'])->middleware('checkadmin')->name('home.teacher_forms');
