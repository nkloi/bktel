<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\StudentsController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');

Route::group(['prefix' => 'students'], function () {
	Route::get('/{student_id}', [StudentsController::class, 'show'])->name('student.show');
	Route::post('/', [StudentsController::class, 'store'])->name('student.store');
	Route::put('/{student_id}', [StudentsController::class, 'update'])->name('student.update');
	Route::any('/delete/{student_id}',  [StudentsController::class, 'delete'])->name('student.destroy');
});

Route::get('information', [App\Http\Controllers\Admin\StudentsController::class, 'information'])->name('student.information');