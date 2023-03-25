<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;
    protected $table = 'incidents';
    public $timestamps = false;

    public function tipus_incidents()
    {
        return $this->belongsTo(TipusIncident::class, 'tipus_incidents_id');
    }

    //carta trucada
    public function cartesTrucades()
    {
        return $this->hasMany(CartaTrucada::class, 'incidents_id');
    }
}
