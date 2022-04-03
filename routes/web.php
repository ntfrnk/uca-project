<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');

Route::middleware('auth')->group(function(){

	Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::get('/course/inscription/{course}', [App\Http\Controllers\CourseController::class, 'inscription'])->name('course.inscription');

	Route::get('/settings', [App\Http\Controllers\SettingController::class, 'settings'])->name('settings');

	Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

});