<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Redirige al usuario logueado a su
     * respectiva pantalla principal
     * 
     * @return Redirect
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
