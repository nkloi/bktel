<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'students'], function () {
	Route::get('/{student_id}', [StudentController::class,'show'])->name('student.show');
	Route::post('/',[StudentController::class,'store'])->name('student.store');
	Route::put('/{student_id}', [StudentController::class,'update'])->name('student.update');
	Route::delete('/{student_id}', [StudentController::class,'destroy'])->name('student.destroy');
});
