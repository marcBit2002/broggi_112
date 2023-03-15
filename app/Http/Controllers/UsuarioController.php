<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Clases\Utilitat;
use App\Models\TiposUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class UsuarioController extends Controller
{
    /* ---------- Methods CRUD ---------- */
    public function index()
    {

        $usuaris = Usuario::orderBy('nom', 'ASC')->paginate(6)->get();
        $roles = TiposUsuario::orderBy('nom', 'ASC')->paginate(6)->get();

        return view('usuarios.admin', compact('usuaris', 'roles'));
    }

    public function store(Request $request)
    {
        $usuari = new Usuario;
        $usuari->username = $request->input('username');
        $usuari->nom = $request->input('nom');
        $usuari->cognoms = $request->input('cognoms');
        $usuari->contrasenya = \bcrypt($request->input('contrasenya'));
        $usuari->tipus_usuaris_id = $request->input('tipus_usuaris_id');

        try {
            $usuari->save();
            $response =  redirect()->action([UsuarioController::class, 'index']);
            session()->flash('mensaje', 'Registre creat correctament');
        } catch (QueryException $exception) {
            $mensaje = Utilitat::errorMessage($exception);
            session()->flash('error', $mensaje);
            $response =  redirect()->action([UsuarioController::class, 'create'])->withInput(); //Enlloc de create(vista) que sigui un modal
        }
        return $response;
    }
    public function update(Request $request, Usuario $usuario)
    {

        $usuario->username = $request->input('username');
        $usuario->nom = $request->input('nom');
        $usuario->cognoms = $request->input('cognoms');
        $usuario->contrasenya = \bcrypt($request->input('contrasenya'));
        $usuario->tipus_usuaris_id = $request->input('tipus_usuaris_id');

        try {
            $usuario->save();
            $response =  redirect()->action([UsuarioController::class, 'index']);
            session()->flash('mensaje', 'Registre actualitzat correctament');
        } catch (QueryException $exception) {
            $mensaje = Utilitat::errorMessage($exception);
            session()->flash('error', $mensaje);
            $response =  redirect()->action([UsuarioController::class, 'edit'], ['usuario' => $usuario->id])->withInput(); //Enlloc de edit(vista) que sigui un modal
        }
        return $response;
    }

    public function destroy(Usuario $usuario)
    {
        try {
            $usuario->delete();
            session()->flash('mensaje', 'Registre esborrat correctament');
        } catch (QueryException $exception) {
            $mensaje = Utilitat::errorMessage($exception);
            session()->flash('error', $mensaje);
        }
        return redirect()->action([UsuarioController::class, 'index']);
    }

    /* ---------- Methods LOGIN ---------- */
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
