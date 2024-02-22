--- {Lkrms\Utility\Env::apply:83} Locale: en_US.UTF-8
<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdviceController;
use App\Http\Controllers\BenchmarkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});
Route::get('/admin-login', function () {
    return view('back.admin-login');
})->name('admin.login.form');

Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');

Route::get('/admin', [HomeController::class, 'index'])->middleware('admin');

Route::post('/admin/logout', function () {
    Auth::logout();

    return redirect('/');
})->name('admin.logout');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('admin');
Route::resource('users', UserController::class)->middleware('admin');
Route::resource('plants', PlantController::class)->middleware('admin');
Route::resource('addresses', AddressController::class)->middleware('admin');
Route::resource('missions', MissionController::class)->middleware('admin');
Route::resource('advices', AdviceController::class)->middleware('admin');
Route::resource('sessions', SessionController::class)->middleware('admin');

Route::get('/benchmark', function () {
    return view('back.benchmark');
})->middleware('admin');
Route::get('/benchmark/run/{test}', [BenchmarkController::class, 'runTest'])->middleware('admin');
