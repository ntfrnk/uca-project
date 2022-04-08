<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/course/{course_id}/students', [ApiController::class, 'index'])
	->where('course_id', '^[0-9]{1,10}$');
