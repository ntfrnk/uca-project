<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Dashboard
     * 
     * @return view
     */
    public function index()
    {
        if(isAdmin()){
            return redirect()->route('user.index');
        } else {
            return redirect()->route('student.course.index');
        }
    }
}
