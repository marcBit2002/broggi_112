<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use App\Clases\Utilitat;
use App\Models\Municipi;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class AgenciaController extends Controller
{
    /* ---------- Methods CRUD ---------- */
    public function index()
    {
        $agencies = Agencia::orderBy('nom', 'ASC')->paginate(8);
        $municipis = Municipi::orderBy('nom', 'ASC')->get();
        $navLateral = 'agencies';
        return view('agencies', compact('agencies', 'municipis', 'navLateral'));
    }

    public function create()
    {
        // return back()->withInput()->with('show', true);
    }

    public function store(Request $request)
    {
        $agencia = new Agencia;
        $agencia->nom = $request->input('nom');
        $agencia->carrer = $request->input('carrer');
        $agencia->codi_postal = $request->input('codi_postal');
        $agencia->municipis_id = $request->input('municipi_id');

        try {
            $agencia->save();
            $response =  redirect()->action([AgenciaController::class, 'index']);
            session()->flash('mensaje', 'Registre creat correctament');
        } catch (QueryException $exception) {
            $mensaje = Utilitat::errorMessage($exception);
            session()->flash('error', $mensaje);
            $response =  redirect()->action([AgenciaController::class, 'create'])->withInput(); //Enlloc de create(vista) que sigui un modal
        }
        return $response;
    }
    public function edit()
    {
        // return back()->withInput()->with('show', true);
    }

    public function update(Request $request, Agencia $agency)
    {

        $agency->nom = $request->input('nom');
        $agency->carrer = $request->input('carrer');
        $agency->codi_postal = $request->input('codi_postal');
        $agency->municipis_id = $request->input('municipi_id');

        try {
            $agency->save();
            $response =  redirect()->action([AgenciaController::class, 'index']);
            session()->flash('mensaje', 'Registre actualitzat correctament');
        } catch (QueryException $exception) {
            $mensaje = Utilitat::errorMessage($exception);
            session()->flash('error', $mensaje);
            $response =  redirect()->action([AgenciaController::class, 'edit'], ['agencia' => $agency->id])->withInput(); //Enlloc de edit(vista) que sigui un modal
        }
        return $response;
    }

    public function destroy(Agencia $agency)
    {
        try {
            $agency->delete();
            session()->flash('mensaje', 'Registre esborrat correctament');
        } catch (QueryException $exception) {
            $mensaje = Utilitat::errorMessage($exception);
            session()->flash('error', $mensaje);
        }
        return redirect()->action([AgenciaController::class, 'index']);
    }
}
