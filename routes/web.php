<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\Admin\TeachersController;
use App\Http\Controllers\Admin\TeacherToSubjectsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\checkuser;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::group(['prefix' => 'students'], function () {
    Route::get('/information', [StudentsController::class, 'information'])->middleware('auth')->name('auth.information');
	Route::get('/{student_id}', [StudentsController::class, 'show'])->name('student.show');
	Route::post('/', [StudentsController::class, 'store'])->name('student.store');
	Route::put('/{student_id}', [StudentsController::class, 'update'])->name('student.update');
	//Route::delete('/{student_id}',  [StudentsController::class, 'delete'])->name('student.destroy');
	Route::any('/delete/{student_id}',  [StudentsController::class, 'delete'])->name('student.destroy');
});

//Route::post('/dashboard', [DashboardController::class, 'index'])->name('dashboard.home');

Route::post('information', [StudentsController::class, 'information'])->middleware('auth')->name('auth.information');


Route::group(['prefix' => 'dashboard', 'middleware' => ['auth'],['checkuser'] ], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.home');
    Route::get('/import',[DashboardController::class, 'showform']) -> name('dashboard.showform');
    Route::post('/import',[DashboardController::class, 'import']) -> name('dashboard.import');

        Route::group(['prefix' => 'students'], function () {
                Route::get('/register', [DashboardController::class, 'RegisterStudent'])->name('student.register');
                Route::get('/import', [DashboardController::class, 'ShowformImportStudent'])->name('student.import.showform');
                Route::post('/import',[DashboardController::class, 'ImportStudent']) -> name('student.import');

                Route::get('/form-upload-file', [StudentsController::class, 'ShowformUploadFile'])->name('show.form.upload');
                Route::post('/search-subject', [StudentsController::class, 'SearchSubject'])->name('search.subject');
                Route::post('/confirm-subject', [StudentsController::class, 'ConfirmSubject'])->name('confirm.subject');

                Route::post('/upload-file',[StudentsController::class, 'UploadFileReport']) -> name('upload.file.report');
                 });
        Route::group(['prefix' => 'teachers'], function () {
              Route::get('/register', [DashboardController::class, 'RegisterTeacher'])->name('teacher.register');
              Route::get('/import',[DashboardController::class, 'ShowformImportTeacher']) -> name('teacher.import.showform');
              Route::post('/import',[DashboardController::class, 'ImportTeacher']) -> name('teacher.import');

              Route::get('/form-upload-mark', [TeachersController::class, 'ShowformUploadMark'])->name('show.form.upload.mark');
              Route::post('/search-report', [TeachersController::class, 'SearchReport'])->name('teacher.search.report');
              Route::post('/search-all-report', [TeachersController::class, 'SearchAllReport'])->name('teacher.search.allreport');
              Route::get('/download-file-report', [TeachersController::class, 'DowloadfileReport'])->name('teacher.dowload.report');
              Route::post('/set-mark-report', [TeachersController::class, 'SetMarkReport'])->name('teacher.setmark.report');
              Route::get('/form-export-file-mark', [TeachersController::class, 'FormExportFileMark'])->name('teacher.export.mark.form');
              Route::post('/export-file-mark-csv', [TeachersController::class, 'ExportFileMarkCsv'])->name('teacher.export.mark');

                 });
        Route::group(['prefix' => 'admin'], function () {
            Route::get('/import-subjects',[DashboardController::class, 'ShowImportSubject']) -> name('showimport.subject');
            Route::get('/form-subjects',[DashboardController::class, 'ShowFormSubject']) -> name('showform.subjecct');
            Route::post('/import-subjects',[DashboardController::class, 'ImportSubject']) -> name('import.subject');
            Route::post('/form-subjects',[DashboardController::class, 'FormSubject']) -> name('form.subject');
            Route::get('/show-register-subjects',[TeacherToSubjectsController::class, 'ShowRegisterSubjects']) -> name('show.RegisterSubjects');
            Route::post('/teacher-to-subjects',[TeacherToSubjectsController::class, 'storeTeachertoSubjects']) -> name('storeTeachertoSubjects');
            Route::get('/teacher-to-subjects',[TeacherToSubjectsController::class, 'showInforTeacherAndSubject']) -> name('show.InforTeacherAndSubjects');

                 });

            });

        Route::group(['prefix' => 'teachers'], function () {
            Route::get('/addteacher', [TeachersController::class, 'register'])->name('teacher.register');
            Route::get('/{teacher_id}', [TeachersController::class, 'show2'])->name('teacher.show');
            Route::post('/', [TeachersController::class, 'store2'])->name('teacher.store');

});


Route::get('/test', [DashboardController::class, 'test'])->middleware('auth')->name('test');
