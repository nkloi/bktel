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
Route::group(['prefix' => 'subjects'], function () {
    Route::post('/stored', [App\Http\Controllers\SubjectsController::class, 'store'])->name('subject.store');
    Route::post('/uploaded', [App\Http\Controllers\SubjectsController::class, 'upload'])->name('subject.upload');
});
Route::group(['prefix' => 'teacher_subject'], function () {
    Route::post('/stored', [App\Http\Controllers\TeacherToSubjectController::class, 'store'])->name('teacher_subject.store');
});
Route::get('/home/student_form', [App\Http\Controllers\HomeController::class, 'student_form'])->name('home.student_form');
Route::get('/home/teacher_form', [App\Http\Controllers\HomeController::class, 'teacher_form'])->middleware('checkadmin')->name('home.teacher_form');
Route::get('/home/add_student', [App\Http\Controllers\HomeController::class, 'add_student'])->middleware('checkadmin')->name('home.add_student');
Route::get('/home/add_subject', [App\Http\Controllers\HomeController::class, 'add_subject'])->middleware('checkadmin')->name('home.add_subject');
Route::get('/home/teacher_subject', [App\Http\Controllers\HomeController::class, 'teacher_subject'])->middleware('checkadmin')->name('home.teacher_subject');
Route::post('/home/search', [App\Http\Controllers\TeacherToSubjectController::class, 'search'])->name('home.search');
Route::post('/home/search_report', [App\Http\Controllers\ReportsController::class, 'search'])->name('home.search_report');
Route::get('/home/get_teacher_code', [App\Http\Controllers\TeacherToSubjectController::class, 'getAllTeacherCode'])->name('home.get_teacher_code');
Route::get('/home/get_subject_code', [App\Http\Controllers\TeacherToSubjectController::class, 'getAllSubjectCode'])->name('home.get_subject_code');
Route::get('/home/get_role', [App\Http\Controllers\TeacherToSubjectController::class, 'getRole'])->name('home.get_role');
Route::post('/home/upload_report', [App\Http\Controllers\ReportsController::class, 'upload'])->name('home.upload_report');
Route::get('/home/upload_proimage', [App\Http\Controllers\HomeController::class, 'upload_proimage'])->name('home.upload_proimage');
Route::post('/home/save_proimage', [App\Http\Controllers\HomeController::class, 'save_proimage'])->name('home.save_proimage');
Route::post('/home/set_mark', [App\Http\Controllers\ReportsController::class, 'set_mark'])->name('home.set_mark');
Route::get('/home/open_file', [App\Http\Controllers\ReportsController::class, 'open_file'])->name('home.open_file');
Route::post('/home/export', [App\Http\Controllers\ReportsController::class, 'export'])->name('home.export');
Route::get('/home/download_export', [App\Http\Controllers\ReportsController::class, 'download_export'])->name('home.download_export');
