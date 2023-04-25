<?php

namespace App\Http\Controllers;

use App\Clases\Utilitat;
use App\Models\CartaTrucada;
use App\Models\EstatAgencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CartaTrucadaHasAgencia;
use Illuminate\Database\QueryException;

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
        $expedientId = $carta->expedients_id;
        $expedientCodi = $carta->expedients->codi;
        $expedientEstat = $carta->expedients->estatExpedient->estat;
        $expedientEstatColor = $carta->expedients->estatExpedient->color;

        return view('infoCarta', compact('carta', 'expedientCodi', 'expedientEstat', 'expedientEstatColor', 'estatAgencies', 'expedientId'));
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
        $estatAgencies = EstatAgencia::all();

        $carta = CartaTrucada::find($infoCartum->id);
        $expedientId = $carta->expedients_id;
        $expedientCodi = $carta->expedients->codi;
        $expedientEstat = $carta->expedients->estatExpedient->estat;
        $expedientEstatColor = $carta->expedients->estatExpedient->color;

        try {
            foreach ($infoCartum->cartesTrucadesHasAgencies as $c) {
                CartaTrucadaHasAgencia::where('cartes_trucades_id', $infoCartum->id)
                    ->where('agencies_id', $c->agencies_id)
                    ->update(['estat_agencies_id' => $request->input('estatAgencies' . $c->agencies_id)]);
            };
            $response = redirect()->action([CartaTrucadaHasAgenciaController::class, 'update'], ['infoCartum' => $infoCartum->id]);
            session()->flash('mensaje', 'Modificat correctament');
        } catch(QueryException $ex) {
            $mensaje = Utilitat::errorMessage($ex);
            session()->flash('error', $mensaje); 
            $response = redirect()->action([CartaTrucadaHasAgenciaController::class, 'update'], ['infoCartum' => $infoCartum->id])->withInput();
        }
        
        return view('infoCarta', compact('carta', 'expedientCodi', 'expedientEstat', 'expedientEstatColor', 'estatAgencies', 'expedientId'));
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
