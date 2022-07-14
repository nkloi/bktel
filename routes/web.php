<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\TeacherController;
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
Route::get('/getStudentid', function () {
	$role = Auth::user()->student_id;
	return response()->json($role);
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::post('add_teacher', [App\Http\Controllers\TeacherController::class, 'store'])->name('add.teacher');
Route::get('getCurrentUser', function () {$role = Auth::user()->role_id; return response()->json($role);});
route::get('/teacher-imp', [App\Http\Controllers\TeacherController::class, 'index'])->middleware('auth', 'admin');

Route::group(['prefix' => 'students'], function () {
	Route::get('/{student_id}', [StudentsController::class, 'show'])->name('student.show');
	Route::post('/', [StudentsController::class, 'store'])->name('student.store');
	Route::put('/{student_id}', [StudentsController::class, 'update'])->name('student.update');
	Route::any('/delete/{student_id}',  [StudentsController::class, 'delete'])->name('student.destroy');
});

Route::get('information', [App\Http\Controllers\Admin\StudentsController::class, 'information'])->name('student.information');
Route::get('/subject', [App\Http\Controllers\SubjectController::class, 'index']);
Route::post('added', [App\Http\Controllers\SubjectController::class, 'store'])->name('add_subs');
Route::get('/finding', [App\Http\Controllers\TeacherToSubjectController::class, 'index'])->name('find');
Route::post('upl', [App\Http\Controllers\TeacherToSubjectController::class, 'SubjectAndTeacher'])->name('soupntea');

Route::get('/project', [App\Http\Controllers\SearchController::class, 'index'])->middleware('auth');
Route::post('/search', [App\Http\Controllers\SearchController::class, 'postSearch']);
Route::post('file-upload', [App\Http\Controllers\FileUploadController::class, 'fileUploadPost'])->name('file.upload.post');
Route::post('imp', [App\Http\Controllers\SearchController::class, 'importSub'])->name('importSub');
Route::post('/addnew', [App\Http\Controllers\FileUploadController::class, 'confirm']);


