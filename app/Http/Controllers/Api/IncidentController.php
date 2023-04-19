<?php

namespace App\Http\Controllers\Api;

use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\Resources\IncidentResource;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $incidents = Incident::with('tipus_incidents')->get();
    //     return IncidentResource::collection($incidents);
    // }
    public function index(Request $request)
    {
        $tipus_incidents_id = $request->input('tipus_incidents_id');
        if ($tipus_incidents_id) {
            $incidents = Incident::with('tipus_incidents')->orderBy('nom', 'ASC')
                ->where('tipus_incidents_id', $tipus_incidents_id)
                ->get();
        } else {
            $incidents = Incident::with('tipus_incidents')->orderBy('nom', 'ASC')->get();
        }
        return IncidentResource::collection($incidents);
    }

    // http://localhost/broggi_112/public/api/incident?tipus_incidents_id=2

    public function tipusIncidents()
    {
        $results = Incident::select('tipus_incidents.nom', DB::raw('COUNT(tipus_incidents_id) AS total_usuarios'))
        ->join('tipus_incidents', 'incidents.tipus_incidents_id', '=', 'tipus_incidents.id')
        ->groupBy('tipus_incidents_id')
        ->groupBy('tipus_incidents.nom')
        ->get();
    
        return $results;
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
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function show(Incident $incident)
    {
        $incidents = Incident::with('tipus_incidents')->where('id', '=', $incident->id)->get();
        return IncidentResource::collection($incidents);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incident $incident)
    {
        //
    }
}
