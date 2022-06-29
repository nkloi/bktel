<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\StudentsController;
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


Route::group(['prefix' => 'students'], function () {
	Route::get('/', [ App\Http\Controllers\Admin\StudentsController::class, 'index' ])->name('student.index');
	Route::get('/{student_id}', [ App\Http\Controllers\Admin\StudentsController::class, 'show' ])->name('student.show');
	Route::post('/', [ App\Http\Controllers\Admin\StudentsController::class, 'store' ] )->name('student.store');
	Route::put('/{student_id}', [ App\Http\Controllers\Admin\StudentsController::class, 'update' ])->name('student.update');
	Route::any('/delete/{student_id}', [ App\Http\Controllers\Admin\StudentsController::class, 'delete' ])->name('student.destroy');
    Route::any('/delete/{user_id}', [ App\Http\Controllers\Admin\StudentsController::class, 'delete_user' ])->name('user.destroy');
});

Route::get('information', [App\Http\Controllers\Admin\StudentsController::class, 'information'])->name('student.information');
Route::get('show_user', [App\Http\Controllers\Admin\StudentsController::class, 'show_user'])->name('show.user');
