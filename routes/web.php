<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('information', [App\Http\Controllers\StudentsController::class, 'information'])->name('student.information');
// Route::get('show_user', [App\Http\Controllers\Admin\StudentsController::class, 'show_user'])->name('show.user');


Route::get('/{student_id}', [App\Http\Controllers\StudentsController::class, 'show'])->name('student.show');
Route::post('/', [App\Http\Controllers\StudentsController::class, 'store'])->name('student.store');
Route::put('/{student_id}', [App\Http\Controllers\StudentsController::class, 'update'])->name('student.update');
Route::delete('/{student_id}', [App\Http\Controllers\StudentsController::class, 'destroy'])->name('student.destroy');

