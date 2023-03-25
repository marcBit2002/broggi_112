<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);

        // return [
        //     "tipus_localitzacions_id" => $this->tipus_localitzacions_id,
        //     "tipus_localitzacions_id" => TipusLocalitzacioResource::make($this->tipusLocalitzacions),
        //     "municipi_id" => $this->municipis_id,
        //     "municipis_id" => MunicipiResource::make($this->municipis),
        //     "incidents_id" => IncidentResource::make($this->incidents),
        //     "expedient_id" => $this->expedients_id,
        //     "expedient_complet" => ExpedientResource::make($this->expedients),
        //     "usuari_id" => $this->usuaris_id,
        //     "usuari_id" => UsuarioResource::make($this->usuaris)
        // ];
    }
}
