<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Level;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Muestra un listado con los usuarios del sistema
     * Si recibe el parámetro "level_id" filtra los
     * usuarios según el tipo requerido
     *
     * @param int $level_id
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
     * Muestra el formulario de creación
     * de un nuevo usuario
     *
     * @return View
     */
    public function create()
    {
        $levels = Level::all();
        return view('admin.user.create', compact('levels'));
    }

    /**
     * Guarda el nuevo usuario en el sistema
     *
     * @param App\Http\Requests\StoreUserRequest $request
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
     * Muestra el formulario de edición de usuario
     *
     * @param App\Models\User $user
     * @return View
     */
    public function edit(User $user)
    {
        $levels = Level::all();
        return view('admin.user.edit', compact('user', 'levels'));
    }

    /**
     * Guarda los cambios en un usuario
     *
     * @param App\Http\Requests\UpdateUserRequest $request
     * @param App\Models\User $user
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
     * Elimina un usuario
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
     * Se crea un usuario con datos aleatorios
     * el tipo estará determinado por el "level_id"
     *
     * @param int $level_id
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
