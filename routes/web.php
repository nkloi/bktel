<?php

use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TeachersController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('redirect')->name('home');

Route::group(['prefix' => 'students'], function () {
	Route::get('/{student_id}', [StudentsController::class,'show'])->name('student.show');
	Route::post('/',[StudentsController::class,'store'])->name('student.store');
	Route::put('/{student_id}', [StudentsController::class,'update'])->name('student.update');
	Route::delete('/{student_id}', [StudentsController::class,'destroy'])->name('student.destroy');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {

	Route::get('/', function() {
		return view('dashboard.home');
	})->name('dashboard.home');
	
	Route::group(['prefix' => 'students'], function () {
		Route::get('/register', [StudentsController::class, 'showRegister'])->name('student.register');
		Route::get('/home',[StudentsController::class, 'index'])->name('student.index');
		Route::get('/import',[StudentsController::class, 'showImport'])->name('student.showimport');
		Route::post('/register', [StudentsController::class, 'store'])->name('student.store');
		Route::post('/import', [StudentsController::class, 'storeImport'])->name('student.import.store');
	});

	Route::group(['prefix' => 'teachers'], function () {
		Route::get('/register', [TeachersController::class, 'showRegister'])->name('teacher.register');
		Route::get('/import', [TeachersController::class, 'showImport'])->name('teacher.showimport');
		Route::get('/home',[TeachersController::class, 'index'])->name('teacher.index');
		Route::post('/register', [TeachersController::class, 'store'])->name('teacher.store');
		Route::post('/import', [TeachersController::class, 'storeImport'])->name('teacher.import.store');
	});

	Route::group(['prefix' => 'subjects'], function () {
		Route::get('/form', [SubjectsController::class, 'showForm'])->name('subject.form');
		Route::get('/import', [SubjectsController::class, 'showImport'])->name('subject.showimport');
		Route::get('/home',[SubjectsController::class, 'index'])->name('subject.index');
		Route::post('/form', [SubjectsController::class, 'store'])->name('subject.store');
		Route::post('/import', [SubjectsController::class, 'storeImport'])->name('subject.import.store');
	});
});