<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartaTrucada extends Model
{
    use HasFactory;
    protected $table =  'cartes_trucades';
    public $timestamps = false;

    //interlocutor

    //tipus localització
    public function tipusLocalitzacions()
    {
        return $this->belongsTo(TipusLocalitzacio::class, 'tipus_localitzacions_id');
    }
    
    //incident
    public function incidents()
    {
        return $this->belongsTo(Incident::class, 'incidents_id');
    }
    
    //expedient
    public function expedients()
    {
        return $this->belongsTo(Expedient::class, 'expedients_id');
    }

    //usuari
    public function usuaris()
    {
        return $this->belongsTo(Usuario::class, 'usuaris_id');
    }

    //ternaria
    public function cartesTrucadesHasAgencies()
    {
        return $this->belongsTo(CartaTrucadaHasAgencia::class, 'cartes_trucades_id');
    }

    //municipi
    public function municipis()
    {
        return $this->belongsTo(Municipi::class, 'municipis_id');
    }

    //provincies
    public function provincies()
    {
        return $this->hasMany(Provincia::class, 'provincies_id');
    }
}
