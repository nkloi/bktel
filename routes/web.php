<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\Admin\TeachersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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


Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('dashboard.home');
    })->name('dashboard.home');

    Route::group(['prefix' => 'students'], function () {
                Route::get('/register', [DashboardController::class, 'RegisterStudent'])->name('student.register');
    });
    Route::group(['prefix' => 'teachers'], function () {
              Route::get('/register', [DashboardController::class, 'RegisterTeacher'])->name('teacher.register');
    });

});

Route::group(['prefix' => 'teachers'], function () {
    Route::get('/addteacher', [TeachersController::class, 'register'])->name('teacher.register');
	Route::get('/{teacher_id}', [TeachersController::class, 'show2'])->name('teacher.show');
	Route::post('/', [TeachersController::class, 'store2'])->name('teacher.store');

});

