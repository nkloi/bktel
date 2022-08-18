<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\StudentsController;
use App\Models\roles;
use Whoops\Run;
use App\Http\Middleware\AdminCheck;

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

Route::get('', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'students'], function () {
	Route::get('/upload-students', [App\Http\Controllers\Admin\UploadController::class, 'uploadStudents'])->middleware('isAdmin')->name('upload.students');
	Route::post('/import-students', [App\Http\Controllers\Admin\UploadController::class, 'importStudents'])->middleware('isAdmin')->name('import.students');
	Route::get('/{student_id}', [App\Http\Controllers\Admin\StudentsController::class, 'show'])->name('student.show');
	Route::post('/', [App\Http\Controllers\Admin\StudentsController::class, 'store'])->name('student.store');
	Route::put('/{student_id}', [App\Http\Controllers\Admin\StudentsController::class, 'update'])->name('student.update');
	Route::any('/delete/{student_id}', [App\Http\Controllers\Admin\StudentsController::class, 'delete'])->name('student.destroy');
	Route::any('/delete/{user_id}', [App\Http\Controllers\Admin\StudentsController::class, 'delete_user'])->name('user.destroy');
});

Route::get('getCurrentUser', function () {

	$role = Auth::user()->role_id;

	return response()->json($role);
});

Route::get('getStudentid', function () {

	$role = Auth::user()->student_id;

	return response()->json($role);
});

Route::group(['prefix' => 'teachers'], function () {
	Route::get('/upload-teachers', [App\Http\Controllers\Admin\UploadController::class, 'uploadTeachers'])->middleware('isAdmin')->name('upload.teachers');
	Route::post('/import-teachers', [App\Http\Controllers\Admin\UploadController::class, 'importTeachers'])->name('import.teachers');
	Route::get('/testloop', [App\Http\Controllers\Admin\UploadController::class, 'testLoop'])->name('loops.teachers');
});

Route::group(['prefix' => 'subjects'], function () {
	Route::get('/upload-subjects', [App\Http\Controllers\Admin\SubjectUploadController::class, 'uploadSubjects'])->middleware('isAdmin')->name('upload.subjects');
	Route::post('/import-subjects', [App\Http\Controllers\Admin\SubjectUploadController::class, 'importSubjects'])->name('import.subjects');
	Route::get('/byhand-subjects', [App\Http\Controllers\Admin\SubjectUploadController::class, 'uploadbyhand'])->name('byhand.subjects');
	Route::post('/createbyhand-subjects', [App\Http\Controllers\Admin\SubjectUploadController::class, 'importbyhand'])->name('importbyhand.subjects');
});

Route::group(['prefix' => 'TeacherToSubject'], function () {
	Route::get('/show', [App\Http\Controllers\Admin\TeacherToSubjectController::class, 'show'])->middleware('isAdmin')->name('teacher.subject');
	Route::get('/add-subject', [App\Http\Controllers\Admin\TeacherToSubjectController::class, 'AddSubjectToTeacher'])->middleware('isAdmin')->name('add.subject');
	Route::any('/get-teachers/{id}', [App\Http\Controllers\Admin\TeacherToSubjectController::class, 'getAllteacherbySubject'])->middleware('isAdmin')->name('show.teachers');
	Route::any('/get-subjects/{id}', [App\Http\Controllers\Admin\TeacherToSubjectController::class, 'getAllsubjectbyTeacher'])->middleware('isAdmin')->name('show.subjects');
});

Route::get('findsubject&teacherform', [App\Http\Controllers\Admin\TeacherToSubjectController::class, 'findform'])->name('findsubject&teacherform');
Route::any('findsubject&teacher', [App\Http\Controllers\Admin\TeacherToSubjectController::class, 'getSubjectAndTeacher'])->name('find.subject&teacher');
Route::get('get_data_subject&teacher', [App\Http\Controllers\Admin\TeacherToSubjectController::class, 'showdata'])->name('showdata.SubjectTeacher');




Route::get('information', [App\Http\Controllers\Admin\StudentsController::class, 'information'])->name('student.information');
Route::get('show_user', [App\Http\Controllers\Admin\StudentsController::class, 'show_user'])->name('show.user');
Route::get('getstudent', [App\Http\Controllers\Admin\StudentsController::class, 'getstudent'])->name('get.student');
Route::get('teacher_menu', [App\Http\Controllers\Admin\TeacherController::class, 'teacher_menu'])->name('get.teacher');
Route::post('add_teacher', [App\Http\Controllers\Admin\TeacherController::class, 'add_teacher'])->name('add.teacher');

Route::post('upload-reports', [App\Http\Controllers\Admin\UploadStudentReport::class, 'formSubmit'])->name('upload.report');
Route::post('confirm_subject', [App\Http\Controllers\Admin\UploadStudentReport::class, 'confirmation'])->name('subject.confirm');
