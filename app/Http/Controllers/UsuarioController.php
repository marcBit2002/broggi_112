<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function showLogin()
    {
        // $usuario = new Usuario();
        // $usuario->username = 'admin';
        // $usuario->nom = 'Administrador';
        // $usuario->cognoms = 'Sistema';
        // $usuario->contrasenya = \bcrypt('12345');
        // $usuario->tipus_usuaris_id = 3;
        // $usuario->save();
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $contrasenya = $request->input('contrasenya');

        $user = Usuario::where('username', $username)->first();

        if ($user != null && Hash::check($contrasenya, $user->contrasenya)) {
            Auth::login($user);
            $response = redirect('/menu');
        } else {
            $request->flash('error', 'Usuari o contrasenya incorrectes');
            $response = redirect('/login')->withInput();
        }
        return $response;
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
