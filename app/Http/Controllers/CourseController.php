<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inscription(Course $course)
    {
        if(is_null(auth()->user()->courses->where('id', $course->id)->first())){
            auth()->user()->courses()->attach($course->id);
            $message = ['resp' => 'No existía y se agregó'];
        } else {
            $message = ['resp' => 'Ya existía y no se agregó']; 
        }
        return redirect()->route('home')->with($message);
    }
}
