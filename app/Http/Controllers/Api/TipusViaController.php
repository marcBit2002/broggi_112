<?php

namespace App\Http\Controllers\Api;

use App\Models\TipusVia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Resources\TipusViaResource;

class TipusViaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipusVia = TipusVia::get();
        return TipusViaResource::collection($tipusVia);
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
     * @param  \App\Models\TipusVia  $tipusVia
     * @return \Illuminate\Http\Response
     */
    public function show(TipusVia $tipusVia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipusVia  $tipusVia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipusVia $tipusVia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipusVia  $tipusVia
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipusVia $tipusVia)
    {
        //
    }
}
