<!-- <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TraineeController;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Auth\LoginController;

Route::middleware('admin')->group(function () {
    // Admin-only routes
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    // ...
});


Route::get('/admin/login', function () {
    return view('auth.admin-login');
});

Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');


Route::get('/admin/addtrainee', [TraineeController::class, 'showAddTraineeForm'])->name('admin.addtrainee');
Route::post('/admin/addtrainee', [TraineeController::class, 'addTrainee'])->name('admin.addtrainee.submit');
Route::post('/admin/addtrainee/check', [TraineeController::class, 'checkUniqueness'])
    ->name('admin.addtrainee.check');


Route::get('/', function () {
    return view('welcome');
});
Route::get('/activity', function () {
    return view('activity');
});

Route::get('/admin', function() {
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

Route::post('/admin/register', [App\Http\Controllers\TraineeController::class, 'register'])->name('admin.register.submit');
