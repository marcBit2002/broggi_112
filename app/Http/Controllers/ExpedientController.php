<?php

namespace App\Http\Controllers;

use App\Models\Expedient;
use Illuminate\Http\Request;
use App\Models\TipusIncident;
use App\Models\EstatExpedient;
use App\Http\Controllers\Controller;

class ExpedientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipusIncidents = TipusIncident::all();
        $estats = EstatExpedient::all();
        $expedients = Expedient::orderBy('codi', 'ASC')->paginate(4);


        $tipusIncidentsExp = [];
        $datesExp = [];
        foreach ($expedients as $expedient) {
            foreach ($expedient->cartesTrucades as $carta) {
                $nomIncident = $carta->incidents->tipus_incidents->nom;
                array_push($tipusIncidentsExp, $nomIncident);

                $dataTrucada = substr($carta->data_hora_trucada, 0, 10);
                array_push($datesExp, $dataTrucada);
            }
        }
        $tipusIncidentsExpUq = array_unique($tipusIncidentsExp);
        $datesUq = array_unique($datesExp);

        $activeNav = "expedients";
        return view('expedients', compact('estats', 'expedients', 'tipusIncidents', 'datesUq', 'tipusIncidentsExpUq', 'activeNav'));
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
    public function show(Expedient $expedient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expedient  $expedient
     * @return \Illuminate\Http\Response
     */
    public function edit(Expedient $expedient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expedient  $expedient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expedient $expedient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expedient  $expedient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expedient $expedient)
    {
        //
    }
}
