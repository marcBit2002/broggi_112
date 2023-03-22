<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Models\TipusIncident;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Clases\Utilitat;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidents = Incident::orderBy('nom', 'ASC')->paginate(8);
        $tipusIncidents = TipusIncident::orderBy('nom', 'ASC')->get();
        return view('incidents', compact('incidents', 'tipusIncidents'));
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
        $incident = new Incident;
        $incident->codi = $request->input('codi');
        $incident->nom = $request->input('nom');
        $incident->definicio = $request->input('definicio');
        $incident->instruccions = $request->input('instruccions');
        $incident->tipus_incidents_id = $request->input('tipus_incidents_id');

        try {
            $incident->save();
            $response =  redirect()->action([IncidentController::class, 'index']);
            session()->flash('mensaje', 'Registre creat correctament');
        } catch (QueryException $exception) {
            $mensaje = Utilitat::errorMessage($exception);
            session()->flash('error', $mensaje);
            $response =  redirect()->action([IncidentController::class, 'create'])->withInput(); //Enlloc de create(vista) que sigui un modal
        }
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function show(Incident $incident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function edit(Incident $incident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incident $incident)
    {
        $incident->codi = $request->input('codi');
        $incident->nom = $request->input('nom');
        $incident->definicio = $request->input('definicio');
        $incident->instruccions = $request->input('instruccions');
        $incident->tipus_incidents_id = $request->input('tipus_incidents_id');

        try {
            $incident->save();
            $response =  redirect()->action([IncidentController::class, 'index']);
            session()->flash('mensaje', 'Registre actualitzat correctament');
        } catch (QueryException $exception) {
            $mensaje = Utilitat::errorMessage($exception);
            session()->flash('error', $mensaje);
            $response =  redirect()->action([IncidentController::class, 'edit'], ['incident' => $incident->id])->withInput(); //Enlloc de edit(vista) que sigui un modal
        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incident $incident)
    {
        try {
            $incident->delete();
            session()->flash('mensaje', 'Registre esborrat correctament');
        } catch (QueryException $exception) {
            $mensaje = Utilitat::errorMessage($exception);
            session()->flash('error', $mensaje);
        }
        return redirect()->action([IncidentController::class, 'index']);
    }
}
