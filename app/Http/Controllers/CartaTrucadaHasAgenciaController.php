<?php

namespace App\Http\Controllers;

use App\Models\CartaTrucada;
use App\Models\EstatAgencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $agenciesAntigues = $infoCartum->cartesTrucadesHasAgencies;
        DB::beginTransaction();
        foreach ($infoCartum->cartesTrucadesHasAgencies as $c) {
            $c->delete();
        }

        foreach ($agenciesAntigues as $cartaHasAgencia) {
            $cha = new CartaTrucadaHasAgencia();
            $cha->agencies_id = $cartaHasAgencia->agencies_id;
            $estatAgenciaId = $request->input('estatAgencies' . $cartaHasAgencia->agencies_id);
            $cha->estat_agencies_id = intval($estatAgenciaId);
            $infoCartum->cartesTrucadesHasAgencies()->save($cha);
        }
        DB::commit();
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
