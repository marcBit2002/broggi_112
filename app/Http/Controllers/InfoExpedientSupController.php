<?php

namespace App\Http\Controllers;

use App\Models\Expedient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoExpedientSupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expedient  $expedient
     * @return \Illuminate\Http\Response
     */
    public function show(Expedient $infoExpedient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expedient  $expedient
     * @return \Illuminate\Http\Response
     */
    public function edit(Expedient $infoExpedient)
    {
        $expedient = Expedient::find($infoExpedient->id);
        $tipusIncidents = [];
        $dates = [];
        foreach ($expedient->cartesTrucades as $carta) {
            $nomIncident = $carta->incidents->tipus_incidents->nom;
            array_push($tipusIncidents, $nomIncident);

            $dataTrucada = substr($carta->data_hora_trucada, 0, 10);
            array_push($dates, $dataTrucada);
        }
        $tipusIncidentsUq = array_unique($tipusIncidents);
        $datesUq = array_unique($dates);

        return view('infoExpedient', compact('expedient', 'tipusIncidentsUq', 'datesUq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expedient  $expedient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expedient $infoExpedient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expedient  $expedient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expedient $infoExpedient)
    {
        //
    }
}
