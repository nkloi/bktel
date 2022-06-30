<?php


use App\Http\Controllers\AdminController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('role')->name('home');

Route::group(['prefix' => 'students', /*'middleware' => ['auth']*/], function () {
    Route::get('/', [App\Http\Controllers\StudentController::class, 'index'])->name('student.index');
    Route::get('/register', [App\Http\Controllers\StudentController::class, 'showRegister'])->name('student.register');
    Route::get('/{student_id}', [App\Http\Controllers\StudentController::class, 'show'])->name('student.show');
    Route::post('/', [App\Http\Controllers\StudentController::class, 'store'])->name('student.store');
    Route::put('/{student_id}', [App\Http\Controllers\StudentController::class, 'update'])->name('student.update');
    Route::delete('/{student_id}', [App\Http\Controllers\StudentController::class, 'destroy'])->name('student.destroy');
});

Route::get('show_user', [App\Http\Controllers\StudentController::class, 'show_user'])->name('show.user');
Route::get('information', [App\Http\Controllers\StudentController::class, 'information'])->name('information');