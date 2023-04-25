<?php

namespace App\Http\Controllers;

use App\Models\CartaTrucada;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EstatAgencia;

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
     * @param  \App\Models\CartaTrucada  $infoCartum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartaTrucada $infoCartum)
    {
        $carta = CartaTrucada::find($infoCartum->id);

        // Actualizar los estados de las agencias
        foreach ($carta->cartesTrucadesHasAgencies as $index => $cartaHasAgencia) {
            $estatAgenciaId = $request->input('estatAgencies.' . $index);
            $cartaHasAgencia->estat_agencies_id = $estatAgenciaId;
            $cartaHasAgencia->save();
        }
        // he utilizado un bucle foreach para recorrer todas las relaciones cartesTrucadesHasAgencies del modelo Carta 
        // y actualizar sus estados en la base de datos. 
        // Para obtener el valor del estado seleccionado en cada iteración, 
        // he utilizado la sintaxis $request->input('estatAgencies.' . $index) 
        // donde $index es el índice de la relación actual. 
        // Este índice se usa para obtener el valor correcto del array enviado en la petición.

        return view('infoCarta');
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
