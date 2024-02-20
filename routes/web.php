<?php

use App\Http\Controllers\AdviceController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\Auth\AdminLoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddressController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin-login', function () {
    return view('admin-login');
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

