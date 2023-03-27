<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interlocutor extends Model
{
    use HasFactory;

    protected $table = 'interlocutors';
    public $timestamps =  false;

    //carta trucada
    public function cartesTrucades()
    {
        return $this->hasMany(CartaTrucada::class, 'interlocutors_id');
    }
}
