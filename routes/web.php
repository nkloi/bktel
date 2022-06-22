<?php

use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\Admin\TeachersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

// Route::get('/information', function () {
//     return view('auth/information');
// })->name('information');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->middleware('checkuser')->name('home');

Route::group(['prefix' => 'students'], function () {
	Route::get('/{student_id}', [StudentsController::class, 'show'])->name('student.show');
	Route::post('/', [StudentsController::class, 'store'])->name('student.store');
	Route::put('/{student_id}', [StudentsController::class, 'update'])->name('student.update');
	//Route::delete('/{student_id}',  [StudentsController::class, 'delete'])->name('student.destroy');
	Route::any('/delete/{student_id}',  [StudentsController::class, 'delete'])->name('student.destroy');
});



Route::get('information', [StudentsController::class, 'information'])->middleware('auth')->name('auth.information');
Route::post('information', [StudentsController::class, 'information'])->middleware('auth')->name('auth.information');

Route::group(['prefix' => 'teacher'], function () {
	Route::get('/{teacher_id}', [TeachersController::class, 'show2'])->name('teacher.show');
	Route::post('/', [TeachersController::class, 'store2'])->name('teacher.store');
});

//Route::get('test', [TeachersController::class, 'test'])->name('test');

