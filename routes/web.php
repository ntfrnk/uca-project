<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');

Route::middleware('auth')->group(function(){

	Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
	Route::get('/course/inscription/{course}', [App\Http\Controllers\CourseController::class, 'inscription'])->name('course.inscription');

});