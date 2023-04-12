<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\TipusLocalitzacio;
use App\Http\Controllers\Controller;
use App\Http\Resources\Resources\TipusLocalitzacioResource;

class TipusLocalitzacioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipusLocalitzacions = TipusLocalitzacio::orderBy('id', 'ASC')->get();
        return TipusLocalitzacioResource::collection($tipusLocalitzacions);
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
     * @param  \App\Models\TipusLocalitzacio  $tipusLocalitzacio
     * @return \Illuminate\Http\Response
     */
    public function show(TipusLocalitzacio $tipusLocalitzacio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipusLocalitzacio  $tipusLocalitzacio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipusLocalitzacio $tipusLocalitzacio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipusLocalitzacio  $tipusLocalitzacio
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipusLocalitzacio $tipusLocalitzacio)
    {
        //
    }
}
