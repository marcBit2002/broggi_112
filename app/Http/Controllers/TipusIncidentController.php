<?php

namespace App\Http\Controllers;

use App\Models\TipusIncident;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Clases\Utilitat;


class TipusIncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipusIncidents = TipusIncident::orderBy('nom', 'ASC')->paginate(8);
        return view('tipusIncidents', compact('tipusIncidents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipusIncidents = new TipusIncident;
        $tipusIncidents->nom = $request->input('nom');

        try {
            $tipusIncidents->save();
            $response =  redirect()->action([TipusIncidentController::class, 'index']);
            session()->flash('mensaje', 'Registre creat correctament');
        } catch (QueryException $exception) {
            $mensaje = Utilitat::errorMessage($exception);
            session()->flash('error', $mensaje);
            $response =  redirect()->action([TipusIncidentController::class, 'create'])->withInput(); //Enlloc de create(vista) que sigui un modal
        }
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipusIncident  $tipusIncident
     * @return \Illuminate\Http\Response
     */
    public function show(TipusIncident $tipusIncident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipusIncident  $tipusIncident
     * @return \Illuminate\Http\Response
     */
    public function edit(TipusIncident $tipusIncident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipusIncident  $tipusIncident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipusIncident $tipusIncident)
    {

        $tipusIncident->nom = $request->input('nom');

        try {
            $tipusIncident->save();
            $response =  redirect()->action([TipusIncidentController::class, 'index']);
            session()->flash('mensaje', 'Registre actualitzat correctament');
        } catch (QueryException $exception) {
            $mensaje = Utilitat::errorMessage($exception);
            session()->flash('error', $mensaje);
            $response =  redirect()->action([TipusIncidentController::class, 'edit'], ['tipusIncident' => $tipusIncident->id])->withInput(); //Enlloc de edit(vista) que sigui un modal
        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipusIncident  $tipusIncident
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipusIncident $tipusIncident)
    {
        try {
            $tipusIncident->delete();
            session()->flash('mensaje', 'Registre esborrat correctament');
        } catch (QueryException $exception) {
            $mensaje = Utilitat::errorMessage($exception);
            session()->flash('error', $mensaje);
        }
        return redirect()->action([TipusIncidentController::class, 'index']);
    }
}
