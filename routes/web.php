<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('signup');
});

Route::get('/login', 'App\Http\Controllers\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
Route::get('/password/reset', 'PasswordResetController@showResetForm')->name('password.request');
Route::post('/password/email', 'PasswordResetController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'PasswordResetController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'PasswordResetController@reset')->name('password.update');
Route::view('/passwordReset', 'passwordReset');
Route::get('/signup', 'App\Http\Controllers\SignupController@showSignupForm')->name('signup');
Route::get('/legal-notice', 'App\Http\Controllers\LegalNoticeController@showLegalNoticeForm')->name('legal-notice');

