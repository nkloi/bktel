<?php

use App\Http\Controllers\ImportController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('role')->name('home');

Route::group(['prefix' => 'students', 'middleware' => ['auth']], function () {
    Route::get('/{student_id}', [StudentController::class, 'show'])->name('student.show');
    Route::post('/', [StudentController::class, 'store'])->name('student.store');
    Route::put('/{student_id}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/{student_id}', [StudentController::class, 'destroy'])->name('student.destroy');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('dashboard.home');
    })->name('dashboard.home');
    Route::group(['prefix' => 'students'], function () {
        Route::get('/', [StudentController::class, 'index'])->name('student.home');
        Route::get('/register', [StudentController::class, 'showRegister'])->name('student.register');
    });
    Route::group(['prefix' => 'teachers'], function () {
        Route::get('/register', [TeacherController::class, 'showRegister'])->name('teacher.register');
    });
    Route::group(['prefix' => 'admins'], function () {
        Route::get('/import', [ImportController::class, 'showImport'])->name('admin.import');
        Route::post('/import', [ImportController::class, 'store'])->name('admin.import.store');
    });
});

Route::group(['prefix' => 'teachers', 'middleware' => ['auth']], function () {
    Route::post('/', [TeacherController::class, 'store'])->name('teacher.store');
});
