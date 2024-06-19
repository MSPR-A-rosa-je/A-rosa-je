<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdviceController;
use App\Http\Controllers\BenchmarkController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FrontPlantController;
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
})->name('welcome');

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
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

Route::resource('addresses', AddressController::class)->middleware('admin');
Route::resource('missions', MissionController::class)->middleware('admin');
Route::resource('advices', AdviceController::class)->middleware('admin');
Route::resource('sessions', SessionController::class)->middleware('admin');

Route::middleware(['admin'])->group(function () {
    Route::get('/back/plants', [PlantController::class, 'index'])->name('back.plants.index.blade.php');
    Route::get('/back/plants/create', [PlantController::class, 'create'])->name('back.plants.create');
    Route::get('/back/plants/{id}', [PlantController::class, 'show'])->name('back.plants.show');
    Route::post('/back/plants', [PlantController::class, 'store'])->name('back.plants.store');
    Route::get('/back/plants/{id}/edit', [PlantController::class, 'edit'])->name('back.plants.edit');
    Route::put('/back/plants/{id}', [PlantController::class, 'update'])->name('back.plants.update');
    Route::delete('/back/plants/{plant}', [PlantController::class, 'destroy'])->name('back.plants.destroy');
});


Route::get('/benchmark', function () {
    return view('back.benchmark');
})->middleware('admin');
Route::get('/benchmark/run/{test}', [BenchmarkController::class, 'runTest'])->middleware('admin');


Route::middleware(['auth'])->group(function () {
    Route::get('/plants', [FrontPlantController::class, 'index'])->name('front.plants.index');
    Route::get('/plants/create', [FrontPlantController::class, 'create'])->name('front.plants.create');
    Route::post('/plants', [FrontPlantController::class, 'store'])->name('front.plants.store');
    Route::delete('/plants/{plant}', [FrontPlantController::class, 'destroy'])->name('front.plants.destroy');
});

Route::get('/chat', [ChatController::class, 'index'])->name('chat');
Route::get('/chat/{user}', [ChatController::class, 'show'])
    ->middleware('can:talkTo,user')
    ->name('chat.show');
Route::post('/chat/{user}', [ChatController::class, 'store'])->middleware('can:talkTo,user');

