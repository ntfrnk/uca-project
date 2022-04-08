<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Level;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index($level_id = '')
    {
        if(empty($level_id)){
            $users = User::all()->sortBy(['lastname', 'name']);
            session(['filter' => null]);
        } else {
            session(['filter' => $level_id]);
            $users = User::where('level_id', $level_id)->get()->sortBy(['lastname', 'name']);
        }
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $levels = Level::all();
        return view('admin.user.create', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreUserRequest $request
     * @return Redirect
     */
    public function store(StoreUserRequest $request)
    {
        $saved = User::create($request->validated());
        if($saved){
            $route = is_null(session('filter')) ? 'user.index' : 'user.filter';
            return redirect()->route($route, session('filter'))->with([
                'feedback' => 'success', 
                'message' => 'El usuario se creó correctamente'
            ]);
        }
        return back()->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return View
     */
    public function edit(User $user)
    {
        $levels = Level::all();
        return view('admin.user.edit', compact('user', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateUserRequest $request
     * @param \App\Models\User $user
     * @return Redirect
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $updated = $user->update($request->validated());
        if($updated){
            $route = is_null(session('filter')) ? 'user.index' : 'user.filter';
            return redirect()->route($route, session('filter'))->with([
                'feedback' => 'success', 
                'message' => 'El usuario se modificó correctamente'
            ]);
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return Redirect
     */
    public function destroy(User $user)
    {
        $deleted = $user->delete();
        if($deleted){
            $route = is_null(session('filter')) ? 'user.index' : 'user.filter';
            return redirect()->route($route, session('filter'))->with([
                'feedback' => 'success', 
                'message' => 'El usuario se eliminó correctamente'
            ]);
        } else {
            return back()->with([
                'feedback' => 'danger', 
                'message' => 'No se pudo eliminar el usuario'
            ]);
        }
    }

    /**
     * Se agrega un usuario con datos aleatorios
     *
     * @param \App\Models\User $user
     * @return Redirect
     */
    public function newRandomUser($level_id = '3')
    {
        $faker = \Faker\Factory::create('es_AR');

        $saved = User::create([
            'level_id' => $level_id,
            'name' => $faker->firstName(),
            'lastname' => $faker->lastName(),
            'email' => $faker->email(),
            'password' => 'generic',
        ]);

        if($saved){
            $route = is_null(session('filter')) ? 'user.index' : 'user.filter';
            return redirect()->route($route, session('filter'))->with([
                'feedback' => 'success', 
                'message' => 'El usuario se creó correctamente'
            ]);
        } else {
            return back()->with([
                'feedback' => 'danger', 
                'message' => 'No se pudo crear el usuario'
            ]);
        }
    }
}
