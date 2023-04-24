<?php

namespace App\Http\Controllers\Api;

use App\Clases\Utilitat;
use App\Models\Expedient;
use App\Models\CartaTrucada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CartaTrucadaHasAgencia;
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

        $carta = new CartaTrucada;
        $data = $request->json()->all();

        try {

            $expedient = Expedient::where('codi', $data['expedient'])->first();

            if (!$expedient) {
                $expedient = new Expedient;
                $expedient->codi = $data['expedient'];
                $expedient->estat_expedients_id = 1;
                $expedient->save();
            }

            $carta->expedients_id = $expedient->id;





            // dades
            $carta->usuaris_id = Auth::id();
            $carta->nota_comuna = $data['notaComuna'];
            $carta->codi_trucada = $data['codi'];
            $carta->data_hora_trucada = $data['date'];
            $carta->durada = $data['duration'];

            // identificació 
            $carta->telefon = $data['telefon'];
            $carta->nom = $data['nom'];
            $carta->cognoms = $data['cognoms'];
            // $carta->antecedents = $data['antecedents'];

            // localització
            $carta->tipus_localitzacions_id = $data['localitzacio']['id'];
            $carta->provincies_id = $data['provincia'];
            $carta->municipis_id = $data['municipi'];
            $carta->decripcio_localitzacio = $data['localitzacioConcatenada'];
            $carta->altres_ref_localitzacio = $data['altresRef'];

            // tipificació
            $carta->incidents_id = $data['incidentId'];


            // Guardar la carta trucada
            $carta->save();

            // despatx
            // Asociar las agencias con la carta trucada a través de la relación cartesTrucadesHasAgencies
            $agencies = $data['agencies'];
            foreach ($agencies as $agency) {
                $cartaTrucadaHasAgencia = new CartaTrucadaHasAgencia();
                $cartaTrucadaHasAgencia->agencies_id = $agency['id'];
                $cartaTrucadaHasAgencia->estat_agencies_id = 1;
                $carta->cartesTrucadesHasAgencies()->save($cartaTrucadaHasAgencia);
            }


            DB::commit();

            // Respuesta de éxito
            $response = response()->json(['mensaje' => 'Registre creat correctament'], 201);
        } catch (QueryException $exception) {

            DB::rollback();

            // Respuesta de error
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
