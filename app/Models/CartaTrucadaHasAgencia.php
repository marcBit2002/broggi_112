<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartaTrucadaHasAgencia extends Model
{
    use HasFactory;

    protected $primaryKey = ['cartes_trucades_id', 'agencies_id'];
    public $incrementing = false;
    public $timestamps =  false;

    //carta trucada
    public function cartesTrucades()
    {
        return $this->hasMany(CartaTrucada::class, 'cartes_trucades_id');
    }

    //estat agències
    public function estatAgencies()
    {
        return $this->belongsTo(EstatAgencia::class, 'estat_agencies_id');
    }

    //agencies
    public function agencies()
    {
        return $this->belongsTo(Agencia::class, 'agencies_id');
    }
}
