<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateCourseRequest;

use App\Models\Course;
use App\Models\Role;
use App\Models\User;

class CourseController extends Controller
{
    /**
     * Se muestra el listado de cursos creados
     *
     * @return View
     */
    public function index()
    {
        $courses = Course::all()->sortBy('name');
        return view('admin.course.index', compact('courses'));
    }

    /**
     * Se muestra el formulario de creación de un curso
     *
     * @return View
     */
    public function create()
    {
        return view('admin.course.create');
    }

    /**
     * Se guardan los datos del nuevo curso
     *
     * @param App\Http\Requests\StoreCourseRequest $request
     * @return Redirect
     */
    public function store(StoreCourseRequest $request)
    {
        $saved = Course::create($request->validated());
        if($saved){
            return redirect()->route('course.index')->with([
                'feedback' => 'success', 
                'message' => 'El curso se creó correctamente'
            ]);
        }
        return back()->withInput();
    }

    /**
     * Se muestra el formulario de edición de un curso
     *
     * @param App\Models\Course $course
     * @return View
     */
    public function edit(Course $course)
    {
        return view('admin.course.edit', compact('course'));
    }

    /**
     * Se guardan los cambios de un curso
     *
     * @param App\Http\Requests\UpdateCourseRequest $request
     * @param App\Models\Course $course
     * @return Redirect
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $updated = $course->update($request->validated());
        if($updated){
            return redirect()->route('course.index')->with([
                'feedback' => 'success', 
                'message' => 'El curso se modificó correctamente'
            ]);
        }
        return back()->withInput();
    }

    /**
     * Se muestran los alumnos de un curso
     *
     * @param App\Models\Course $course
     * @return View
     */
    public function students(Course $course)
    {
        return view('admin.course.students', compact('course'));
    }

    /**
     * Se agrega aleatoriamente un alumno al curso
     *
     * @param App\Models\Course $course
     * @return Redirect
     */
    public function random(Course $course)
    {
        $subscribed = $course->students->pluck('id')->toArray();

        $user = User::where('level_id', 3)
        ->where(function($query) use ($subscribed){
            $query->whereHas('courses', function($q) use ($subscribed){
                $q->whereNotIn('user_id', $subscribed);
            });
            $query->doesntHave('courses', 'or');
        })
        ->inRandomOrder()
        ->first();

        if(!is_null($user)){
            $user->courses()->attach($course->id);
            return back()->with([
                'feedback' => 'success', 
                'message' => 'El alumno se agregó correctamente'
            ]);
        }

        return back()->with([
            'feedback' => 'danger', 
            'message' => 'Ya no hay más alumnos para agregar'
        ]);
    }

    /**
     * Se elimina la suscripción de un alumno a un curso
     *
     * @param App\Models\Course $course
     * @param App\Models\User $user
     * @return Redirect
     */
    public function detach(Course $course, User $user)
    {
        $detached = $user->courses()->detach($course->id);

        if($detached){
            return back()->with([
                'feedback' => 'success', 
                'message' => 'La suscripción del alumno se anuló correctamente'
            ]);
        }

        return back()->with([
            'feedback' => 'danger', 
            'message' => 'No se pudo anular la suscripción'
        ]);
    }

    /**
     * Se muestran los profesores de un curso
     *
     * @param App\Models\Course $course
     * @return View
     */
    public function teachers(Course $course)
    {
        return view('admin.course.teachers', compact('course'));
    }

    /**
     * Se muestra el formulario para agregar un
     * profesor a un curso
     *
     * @param App\Models\Course $course
     * @return View
     */
    public function addTeacher(Course $course)
    {
        $used_roles = $course->roles->pluck('id')->toArray();
        $used_teachers = $course->teachers->pluck('id')->toArray();

        $roles = Role::whereNotIn('id', $used_roles)->get();
        $teachers = User::where('level_id', 2)->whereNotIn('id', $used_teachers)->get();

        return view('admin.course.teacher-create', compact('course', 'roles', 'teachers'));
    }

    /**
     * Se agrega un profesor a un curso
     *
     * @param App\Http\Requests\StoreTeacherRequest $request
     * @param App\Models\Course $course
     * @return Redirect
     */
    public function teacherAttach(StoreTeacherRequest $request, Course $course)
    {
        $course->teachers()->attach([
            $request->user_id => [
                'role_id' => $request->role_id
            ]
        ]);

        return redirect()->route('course.teachers', $course)->with([
            'feedback' => 'success', 
            'message' => 'El profesor se agregó correctamente'
        ]);
    }

    /**
     * Se quita un profesor de un curso
     *
     * @param \App\Models\Course $course
     * @param \App\Models\User $user
     * @return Redirect
     */
    public function teacherDetach(Course $course, User $user)
    {
        $course->teachers()->detach($user->id);

        return redirect()->route('course.teachers', $course)->with([
            'feedback' => 'success', 
            'message' => 'La asignación del profesor se quitó correctamente'
        ]);
    }

    /**
     * Se borra un curso
     *
     * @param \App\Models\Course $course
     * @return Redirect
     */
    public function destroy(Course $course)
    {
        $deleted = $course->delete();
        if($deleted){
            return redirect()->route('course.index')->with([
                'feedback' => 'success', 
                'message' => 'El curso se eliminó correctamente'
            ]);
        } else {
            return back()->with([
                'feedback' => 'danger', 
                'message' => 'No se pudo eliminar el curso'
            ]);
        }
    }

    /**
     * Se agrega un curso con datos aleatorios
     *
     * @return Redirect
     */
    public function newRandomCourse()
    {
        $faker = \Faker\Factory::create('es_AR');

        $saved = Course::create([
            'name' => $faker->sentence(),
            'description' => $faker->paragraphs(5, true),
            'status' => 1,
        ]);

        if($saved){
            return redirect()->route('course.index')->with([
                'feedback' => 'success', 
                'message' => 'El curso se creó correctamente'
            ]);
        } else {
            return back()->with([
                'feedback' => 'danger', 
                'message' => 'No se pudo crear el curso'
            ]);
        }
    }
}
