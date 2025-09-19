<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'ingUsuario' => 'required|string',
            'ingPassword' => 'required|string',
        ]);

        // buscar usuario por nombre de usuario
        $user = User::where('usuario', $request->ingUsuario)->first();

        // usuario no existe
        if (! $user) {
            return back()
                ->withErrors(['user' => 'Usuario incorrecto'])
                ->withInput($request->except('ingPassword'));
        }

        // contraseña (si en el futuro usas bcrypt, cambia a Hash::check)
        if ($user->password !== $request->ingPassword) {
            return back()
                ->withErrors(['user' => 'Contraseña incorrecta'])
                ->withInput($request->except('ingPassword'));
        }

        // estado
        if ($user->estado != 1) {
            return back()
                ->withErrors(['user' => 'La cuenta está inactiva o ya está en uso'])
                ->withInput($request->except('ingPassword'));
        }

        // login correcto: regenerar sesión, guardar datos y actualizar estado
        $request->session()->regenerate();
        $request->session()->put('user', [
            'id' => $user->id,
            'usuario' => $user->usuario,
            'nombre' => $user->nombre,
            'apellido' => $user->apellido,
            'rol' => $user->rol,
            'foto' => $user->foto,
        ]);

        $user->ultimo_login = now();
        $user->ultima_actividad = now();
        $user->estado = 0 ;
        $user->save();

        return redirect('/home');
    }

    public function logout(Request $request)
    {
        $sess = $request->session()->get('user');

        if (is_array($sess) && isset($sess['id'])) {
            $user = User::find($sess['id']);
            if ($user) {

                $request->session()->put('user', [
                    'id' => $user->id,
                    'usuario' => $user->usuario,
                    'nombre' => $user->nombre,
                    'apellido' => $user->apellido,
                    'rol' => $user->rol,
                    'foto' => $user->foto,  
                ]);
                Auth::logout();
                $user->estado = 1 ;
                $user->save();
                $request->session()->invalidate();
            }
        }
        return redirect('/');
    }
}
