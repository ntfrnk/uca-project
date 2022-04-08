<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    /**
     * Lista de todos los cursos disponibles
     * 
     * @return View
     */
    public function index()
    {
        $courses = Course::all()->sortBy('name');
        return view('student.course.index', compact('courses'));
    }

    /**
     * Lista de cursos a los que el usuario
     * logueado está suscrito
     * 
     * @return View
     */
    public function subscriptions()
    {
        return view('student.course.subscriptions');
    }

    /**
     * Detalle de un curso
     * 
     * @param App\Models\Course $course
     * @return View
     */
    public function show(Course $course)
    {
        return view('student.course.show', compact('course'));
    }

    /**
     * Suscribe a un curso al alumno logueado
     * 
     * @param App\Models\Course $course
     * @return Redirect
     */
    public function subscribe(Course $course)
    {
        $subscribed = user()->courses()->attach($course->id);
        return back();
    }

    /**
     * Anula la suscripción del alumno logueado a un curso
     * 
     * @param App\Models\Course $course
     * @return Redirect
     */
    public function unsubscribe(Course $course)
    {
        $subscribed = user()->courses()->detach($course->id);
        return back();
    }
}
