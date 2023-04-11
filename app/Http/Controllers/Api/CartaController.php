<?php

namespace App\Http\Controllers\Api;

use App\Clases\Utilitat;
use App\Models\CartaTrucada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Http\Resources\Resources\CartaResource;

class CartaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carta = CartaTrucada::all();

        return CartaResource::collection($carta);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $carta = new CartaTrucada;
            $carta->codi_trucada = $request->input('codi_trucada');
            $carta->data_hora_trucada = $request->input('data_hora_trucada');
            $carta->durada = $request->input('durada');
            $carta->interlocutors_id = $request->input('interlocutors_id');
            $carta->telefon = $request->input('telefon');
            $carta->nom = $request->input('nom');
            $carta->cognoms = $request->input('cognoms');
            $carta->nota_comuna = $request->input('nota_comuna');
            $carta->tipus_localitzacions_id = $request->input('tipus_localitzacions_id');
            $carta->decripcio_localitzacio = $request->input('decripcio_localitzacio');
            $carta->detall_localitzacio = $request->input('detall_localitzacio');
            $carta->altres_ref_localitzacio = $request->input('altres_ref_localitzacio');
            $carta->municipis_id = $request->input('municipis_id');
            $carta->provincies_id = $request->input('provincies_id');
            $carta->incidents_id = $request->input('incidents_id');
            $carta->expedients_id = $request->input('expedients_id');
            $carta->usuaris_id = $request->input('usuaris_id');

            $carta->save();
            DB::commit();
            $response = response()->json(['mensaje' => 'Registre creat correctament'], 201);
        } catch (QueryException $exception) {
            DB::rollback();
            $mensaje = Utilitat::errorMessage($exception);
            $response = response()->json(['error' => $mensaje], 400);
        }
        return $response;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
