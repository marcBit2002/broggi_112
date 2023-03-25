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

        $usuaris = Usuario::orderBy('nom', 'ASC')->paginate(6);
        $roles = TiposUsuario::orderBy('id', 'ASC')->get();

        $activeNav = "usuaris";

        return view('usuaris', compact('usuaris', 'roles', 'activeNav'));
    }

    public function create()
    {
        $usuaris = Usuario::all();
        return back()->with(['mostrarModalAdd' => true, 'usuaris' => $usuaris]);
        // return back()->withInput()->with('mostrarModalAdd', true);
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
    public function edit(Usuario $usuari)
    {
        $usuaris = Usuario::orderBy('nom', 'ASC')->get();
        return back()->with(['mostrarModalEdit' => true, 'usuaris' => $usuaris]);
        // return back()->with('mostrarModalEdit', true);

    }

    public function update(Request $request, Usuario $usuari)
    {

        $usuari->username = $request->input('username');
        $usuari->nom = $request->input('nom');
        $usuari->cognoms = $request->input('cognoms');
        $usuari->contrasenya = \bcrypt($request->input('contrasenya'));
        $usuari->tipus_usuaris_id = $request->input('tipus_usuaris_id');

        try {
            $usuari->save();
            $response =  redirect()->action([UsuarioController::class, 'index']);
            session()->flash('mensaje', 'Registre actualitzat correctament');
        } catch (QueryException $exception) {
            $mensaje = Utilitat::errorMessage($exception);
            session()->flash('error', $mensaje);
            $response =  redirect()->action([UsuarioController::class, 'edit'], ['usuari' => $usuari->id])->withInput(); //Enlloc de edit(vista) que sigui un modal
        }
        return $response;
    }

    public function destroy(Usuario $usuari)
    {
        try {
            $usuari->delete();
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
            session()->flash('error', 'Usuari o contrasenya incorrectes');
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
