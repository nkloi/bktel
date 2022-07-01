<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\Teachers;
use App\Models\Teacher;
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

Route::get('/home', [HomeController::class, 'index'])->middleware('redirectLogin')->name('home');
Auth::routes();

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
		Route::post('/register', [StudentsController::class, 'store'])->name('student.store');
		Route::get('/home',[StudentsController::class, 'index'])->name('student.home');
		Route::get('/import', [StudentsController::class, 'showImport'])->name('student.import');
		Route::post('/import', [StudentsController::class, 'storeImport'])->name('student.import.store');
	});

	Route::group(['prefix' => 'teachers'], function () {
		Route::get('/register', [Teachers::class, 'showRegister'])->name('teacher.register');
		Route::get('/import', [Teachers::class, 'showImport'])->name('teacher.import');
		Route::post('/import', [Teachers::class, 'storeImport'])->name('teacher.import.store');
		Route::post('register', [Teachers::class, 'store'])->name('teacher.store');
	});
	

	Route::group(['prefix' => 'subjects'], function () {
		Route::get('/register', [SubjectsController::class, 'showRegister'])->name('subject.register');
		Route::get('/import', [SubjectsController::class, 'showImport'])->name('subject.import');
		Route::post('/import', [SubjectsController::class, 'storeImport'])->name('subject.import.store');
		Route::post('/register', [SubjectsController::class, 'store'])->name('subject.store');
	});
});