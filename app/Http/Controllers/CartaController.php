<?php

namespace App\Http\Controllers;

use App\Models\CartaTrucada;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartaController extends Controller
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
     * @param  \App\Models\CartaTrucada  $infoCartum
     * @return \Illuminate\Http\Response
     */
    public function show(CartaTrucada $infoCartum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CartaTrucada  $infoCartum
     * @return \Illuminate\Http\Response
     */
    public function edit(CartaTrucada $infoCartum)
    {
        $carta = CartaTrucada::find($infoCartum->id);
        $expedientCodi = $carta->expedients->codi;
        $expedientEstat = $carta->expedients->estatExpedient->estat;
        $expedientEstatColor = $carta->expedients->estatExpedient->color;

        return view('infoCarta', compact('carta', 'expedientCodi', 'expedientEstat', 'expedientEstatColor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CartaTrucada  $infoCartum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartaTrucada $infoCartum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartaTrucada  $infoCartum
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartaTrucada $infoCartum)
    {
        //
    }
}
