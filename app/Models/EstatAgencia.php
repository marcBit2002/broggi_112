<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatAgencia extends Model
{
    use HasFactory;

    protected $table = 'estat_agencies';
    public $timestamps = false;

    //cartesHasAgencies - estatAgencies
    public function cartesTrucadesHasAgencies()
    {
        return $this->hasMany(CartaTrucadaHasAgencia::class, 'estat_agencies_id');
    }
}
