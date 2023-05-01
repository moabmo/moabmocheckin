<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\AdminUserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/activity', function () {
    return view('activity');
});

Route::get('/admin!', function() {
    return view('admin.dashboard');
});



Route::get('/trainees', function () {
    return app('App\Http\Controllers\TraineeController')->index();
})->name('trainees');


Route::get('/admit', [TraineeController::class, 'search'])->name('admit');
Route::put('/trainees/{id}', [TraineeController::class, 'update'])->name('trainees.update');

Route::get('/admitted', [TraineeController::class, 'admitted'])->name('admitted');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/register', function () {
    return app()->make('App\Http\Controllers\TraineeController')->showRegistrationForm();
})->name('admin.register');

// Route::post('/trainees', [TraineeController::class, 'register'])->name('trainees.register');

Route::post('/admin/register', [App\Http\Controllers\TraineeController::class, 'register'])->name('admin.register.submit');
