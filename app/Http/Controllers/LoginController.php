<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Login 
     * 
     * @param App\Http\Requests\LoginRequest $request 
     * @return Redirect
     */
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if(\Hash::check($request->password, $user->password)){
            $login = \Auth::attempt($request->validated());
            return redirect()->route('home');
        }
        return back()->withInput()->with(['error' => 'Los datos ingresados no son correctos']);
    }

    /**
     * Logout
     * 
     * @return Redirect
     */
    public function logout()
    {
        if(\Auth::logout()){
            return redirect()->route('login');
        }
        return redirect()->back();
    }
}
