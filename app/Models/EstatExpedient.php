<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatExpedient extends Model
{
    use HasFactory;

    protected $table = 'estat_expedients';
    public $timestamps = false;

    //expedients
    public function expedients()
    {
        return $this->hasMany(Expedient::class, 'estat_expedients_id');
    }
}
