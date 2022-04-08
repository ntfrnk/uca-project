<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $courses = Course::all()->sortBy('name');
        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
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
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Course $course
     * @return View
     */
    public function edit(Course $course)
    {
        return view('admin.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCourseRequest $request
     * @param \App\Models\Course $course
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
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Course $course
     * @return View
     */
    public function students(Course $course)
    {
        return view('admin.course.students', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Course $course
     * @return View
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
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Course $course
     * @return View
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
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Course $course
     * @return View
     */
    public function teachers(Course $course)
    {
        return view('admin.course.teachers', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Course $course
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
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Course $course
     * @return View
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
     * Show the form for editing the specified resource.
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
     * Remove the specified resource from storage.
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
     * Se agrega un usuario con datos aleatorios
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
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
