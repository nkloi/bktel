<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\Admin\SubjectsController;
use App\Http\Controllers\Admin\TeachersController;
use App\Http\Controllers\Admin\TeacherToSubjectController;
use App\Http\Controllers\Admin\UsersController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'students'], function () {
	Route::get('/{student_id}', [StudentsController::class, 'show'])->name('student.show');
	Route::post('/', [StudentsController::class, 'store'])->name('student.store');
	Route::put('/{student_id}', [StudentsController::class, 'update'])->name('student.update');
	Route::delete('/{student_id}',  [StudentsController::class, 'destroy'])->name('student.destroy');
});
 //register_student street
 Route::group(['prefix' => 'dashboard', 'middleware' => 'auth',['redirectlogin']], function () {

	Route::get('/', function() {
		return view('dashboard.home');
	})->name('dashboard.home');
	
	Route::get('/teacher-to-subject', [TeacherToSubjectController::class, 'getInfoTeacherAndSubject'])->name('teacher-to-subject.info');
	Route::get('/lecture', [TeacherToSubjectController::class, 'showRegister'])->name('lecture.register');
	Route::post('/teacher-to-subject', [TeacherToSubjectController::class, 'store'])->name('teacher-to-subject.store');

	Route::group(['prefix' => 'users'], function (){
		Route::get('/upload-image',[UsersController::class, 'UploadImage'])->name('user.uploadimage');
		Route::post('/upload-user-avatar',[UsersController::class, 'SaveImage'])->name('user.saveimage');
	});
	
	Route::group(['prefix' => 'students'], function () {
		Route::get('/register', [StudentsController::class, 'showRegister'])->name('student.register');
		Route::get('/home',[StudentsController::class, 'index'])->name('student.home');
		Route::post('/register', [StudentsController::class, 'store'])->name('student.store');
		Route::get('/import', [StudentsController::class, 'showImport'])->name('student.import');
		Route::post('/import', [StudentsController::class, 'storeImport'])->name('student.import.store');
		Route::get('/upload', [StudentsController::class, 'showUpload'])->name('student.upload');
		Route::get('/studentID', [StudentsController::class, 'showStudentID'])->name('student.ID');
		Route::post('/search-subject', [StudentsController::class, 'SearchSubject'])->name('search.subject');
		Route::post('/confirm-subject', [StudentsController::class, 'ConfirmSubject'])->name('confirm.subject');
		Route::post('/upload-file', [StudentsController::class, 'UploadFileReport'])->name('upload.file.report');


	});

	Route::group(['prefix' => 'teachers'], function () {
		Route::get('/register', [TeachersController::class, 'showRegister'])->name('teacher.register');
		Route::get('/import', [TeachersController::class, 'showImport'])->name('teacher.import');
		Route::get('/home',[TeachersController::class, 'index'])->name('teacher.home');
		Route::post('/register', [TeachersController::class, 'store'])->name('teacher.store');
		Route::post('/import', [TeachersController::class, 'storeImport'])->name('teacher.import.store');
		Route::get('/getAll', [TeachersController::class, 'getAllTeachers']);
		Route::get('/teacherID',[TeachersController::class, 'showTeacherID'])->name('teacher.ID');
		Route::get('/upload-mark',[TeachersController::class, 'showUploadMark'])->name('teacher.uploadmark');
		Route::get('/download-file-report',[TeachersController::class, 'DownloadFileReport'])->name('teacher.downloadfile');
		Route::post('/search-report',[TeachersController::class, 'SearchReport'])->name('teacher.search.report');
		Route::post('/search-all-report',[TeachersController::class, 'SearchAllReport'])->name('teacher.search.all.report');
		Route::post('/set-mark-report',[TeachersController::class, 'SetMarkReport'])->name('teacher.set.mark.report');
		Route::post('/export-file-mark-csv',[TeachersController::class, 'ExportMarkFileCSV'])->name('teacher.export.mark');
		Route::get('/form-export-file-mark',[TeachersController::class, 'FormExportFileMark'])->name('teacher.form.export.file.mark');
	});

	Route::group(['prefix' => 'subjects'], function () {
		Route::get('/import', [SubjectsController::class, 'showImport'])->name('subject.import');
		Route::post('/import', [SubjectsController::class, 'storeImport'])->name('subject.import.store');
		Route::get('/register', [SubjectsController::class, 'showRegister'])->name('subject.register');
		Route::post('/register', [SubjectsController::class, 'store'])->name('subject.store');
		Route::get('/getAll', [SubjectsController::class, 'getAllSubjects']);
	});
});


// Route::get('relationship', [InsertController::class, 'relationship'])->name('relatioship');


