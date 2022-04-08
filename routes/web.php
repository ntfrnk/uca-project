<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware('auth')->group(function(){

	// Home
	Route::get('/', [HomeController::class, 'index'])->name('home');

	// Datos de cuenta
	Route::get('/account', [AccountController::class, 'index'])->name('account.index');
	Route::patch('/account/update/{user}', [AccountController::class, 'update'])->name('account.update');
	Route::patch('/account/password/update/{user}', [AccountController::class, 'passwordUpdate'])->name('account.password.update');

	// Logout
	Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

	/**
	 * Rutas exclusivas para administradores
	 */
	Route::middleware('admin')->group(function(){

		// Gestión de usuarios
		Route::resource('user', UserController::class);
		Route::get('/user/filter/{level_id?}', [UserController::class, 'index'])->name('user.filter');
		Route::get('/user/store/random/{level_id?}', [UserController::class, 'newRandomUser'])->name('user.random');

		// Gestión de cursos
		Route::resource('course', CourseController::class);
		Route::prefix('course')->group(function(){

			// Estudiantes
			Route::get('/students/{course}', [CourseController::class, 'students'])->name('course.students');
			Route::get('/students/random/{course}', [CourseController::class, 'random'])->name('course.students.random');
			Route::get('/students/detach/{course}/{user}', [CourseController::class, 'detach'])->name('course.students.detach');

			// Profesores
			Route::get('/teachers/{course}', [CourseController::class, 'teachers'])->name('course.teachers');
			Route::get('/teachers/create/{course}', [CourseController::class, 'addTeacher'])->name('course.teachers.create');
			Route::post('/teachers/attach/{course}', [CourseController::class, 'teacherAttach'])->name('course.teachers.attach');
			Route::get('/teachers/detach/{course}/{user}', [CourseController::class, 'teacherDetach'])->name('course.teachers.detach');
			Route::get('/store/random/{level_id?}', [CourseController::class, 'newRandomCourse'])->name('course.random');

		});

	});

	/**
	 * Rutas para funciones de estudiantes
	 */
	Route::prefix('student')->group(function(){

		Route::get('/course', [StudentCourseController::class, 'index'])->name('student.course.index');
		Route::get('/course/subscriptions', [StudentCourseController::class, 'subscriptions'])->name('student.course.subscriptions');
		Route::get('/course/show/{course}', [StudentCourseController::class, 'show'])->name('student.course.show');
		Route::get('/course/subscribe/{course}', [StudentCourseController::class, 'subscribe'])->name('student.course.subscribe');
		Route::get('/course/unsubscribe/{course}', [StudentCourseController::class, 'unsubscribe'])->name('student.course.unsubscribe');

	});

});