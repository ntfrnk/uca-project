<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    /**
     * 
     * 
     * @param App\Http\Requests\LoginRequest $request 
     * @return 
     */
    public function login(LoginRequest $request)
    {
        dd($request->validated());
        return false;
    }
}
