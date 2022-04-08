<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAccountRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Se muestran los formularios para modificar
     * los datos de la cuenta
     *
     * @return View
     */
    public function index()
    {
        $user = User::find(user()->id);
        return view('account.index', compact('user'));
    }

    /**
     * Se modifica la información del usuario
     *
     * @param App\Http\Requests\UpdateAccountRequest $request
     * @param App\Models\User $user
     * @return Redirect
     */
    public function update(UpdateAccountRequest $request, User $user)
    {
        $updated = $user->update($request->validated());
        if($updated){
            return redirect()->route('account.index')->with([
                'feedback' => 'success', 
                'message' => 'Tus datos se actualizaron correctamente'
            ]);
        }
        return back()->withInput();
    }

    /**
     * Se modifica la contraseña
     *
     * @param App\Http\Requests\UpdatePasswordRequest $request
     * @param App\Models\User $user
     * @return Redirect
     */
    public function passwordUpdate(UpdatePasswordRequest $request, User $user)
    {
        $updated = $user->update($request->validated());
        if($updated){
            return redirect()->route('account.index')->with([
                'feedback' => 'success', 
                'message' => 'Tu contraseña se actualizó correctamente'
            ]);
        }
        return back()->withInput();
    }

}
