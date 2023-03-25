<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Agencia;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Municipi extends Model
{
    use HasFactory;
    protected $table = "municipis";
    public $timestamps = false;

    public function agencies(): HasMany
    {
        return $this->hasMany(Agencia::class, 'municipis_id');
    }

    //carta trucada
    public function cartesTrucades()
    {
        return $this->hasMany(CartaTrucada::class, 'municipis_id');
    }
}
