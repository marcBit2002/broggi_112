<?php

namespace App\Http\Controllers;

use App\Models\CartaTrucada;
use App\Models\EstatAgencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CartaTrucadaHasAgencia;

class CartaTrucadaHasAgenciaController extends Controller
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
     * @param  \App\Models\CartaTrucadaHasAgencia  $cartaTrucadaHasAgencia
     * @return \Illuminate\Http\Response
     */
    public function show(CartaTrucadaHasAgencia $cartaTrucadaHasAgencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CartaTrucadaHasAgencia  $cartaTrucadaHasAgencia
     * @return \Illuminate\Http\Response
     */
    public function edit(CartaTrucada $infoCartum)
    {

        $estatAgencies = EstatAgencia::all();

        $carta = CartaTrucada::find($infoCartum->id);
        $expedientCodi = $carta->expedients->codi;
        $expedientEstat = $carta->expedients->estatExpedient->estat;
        $expedientEstatColor = $carta->expedients->estatExpedient->color;

        return view('infoCarta', compact('carta', 'expedientCodi', 'expedientEstat', 'expedientEstatColor', 'estatAgencies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CartaTrucadaHasAgencia  $cartaTrucadaHasAgencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartaTrucada $infoCartum)
    {
        // dd($infoCartum);
        foreach ($infoCartum->cartesTrucadesHasAgencies as $cartaHasAgencia) {
            $estatAgenciaId = $request->input('estatAgencies' . $cartaHasAgencia->agencies_id);
            $cartaHasAgencia->estat_agencies_id = settype($estatAgenciaId, 'integer');
            $cartaHasAgencia->save();
        }
        return view('infoCarta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartaTrucadaHasAgencia  $cartaTrucadaHasAgencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartaTrucadaHasAgencia $cartaTrucadaHasAgencia)
    {
        //
    }
}
