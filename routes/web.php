<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('checkstudent')->name('home');
Route::group(['prefix' => 'students'], function () {
    Route::post('/uploaded', [App\Http\Controllers\StudentsController::class, 'upload'])->name('student.upload');
    Route::get('/create', [App\Http\Controllers\StudentsController::class, 'create'])->name('student.create');
    Route::get('/{id}', [App\Http\Controllers\StudentsController::class, 'show'])->name('student.show');
    Route::post('/stored', [App\Http\Controllers\StudentsController::class, 'store'])->name('student.store');
    Route::post('update/{id}', [App\Http\Controllers\StudentsController::class, 'update'])->name('student.update');
    Route::get('/edit/{id}', [App\Http\Controllers\StudentsController::class, 'edit'])->name('student.edit');
    Route::any('/delete/{id}', [App\Http\Controllers\StudentsController::class, 'destroy'])->name('student.destroy');
});
Route::group(['prefix' => 'teachers'], function () {
    Route::post('/stored', [App\Http\Controllers\TeachersController::class, 'store'])->name('teacher.store');
    Route::post('/uploaded', [App\Http\Controllers\TeachersController::class, 'upload'])->name('teacher.upload');
});
Route::group(['prefix'=>'subjects'], function (){
    Route::post('/stored', [App\Http\Controllers\SubjectsController::class, 'store'])->name('subject.store');
    Route::post('/uploaded' , [App\Http\Controllers\SubjectsController::class, 'upload'])->name('subject.upload');
});
Route::group(['prefix' => 'teacher_subject'], function () {
    Route::post('/stored', [App\Http\Controllers\TeacherTosubjectController::class, 'store'])->name('teacher_subject.store');
});
Route::get('/home/student_form', [App\Http\Controllers\HomeController::class, 'student_form'])->name('home.student_form');
Route::get('/home/teacher_form', [App\Http\Controllers\HomeController::class, 'teacher_form'])->middleware('checkadmin')->name('home.teacher_form');
Route::get('/home/add_student', [App\Http\Controllers\HomeController::class, 'add_student'])->middleware('checkadmin')->name('home.add_student');
Route::get('/home/add_subject', [App\Http\Controllers\HomeController::class, 'add_subject'])->middleware('checkadmin')->name('home.add_subject');
Route::get('/home/teacher_subject', [App\Http\Controllers\HomeController::class, 'teacher_subject'])->middleware('checkadmin')->name('home.teacher_subject');
Route::post('/home/search', [App\Http\Controllers\TeacherTosubjectController::class, 'searh'])->name('home.search');
Route::get('/hoem/get_teacher_code', [App\Http\Controllers\TeacherTosubjectController::class, 'getAllteachercode'])->name('home.get_teacher_code');
Route::get('/home/get_subject_code', [App\Http\Controllers\TeacherTosubjectController::class, 'getAllsubjectcode'])->name('home.get_subject_code');
