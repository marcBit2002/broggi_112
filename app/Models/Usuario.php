<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table =  'usuaris';
    public $timestamps = false;

    public function roles(): BelongsTo
    {
        return $this->belongsTo(TipusUsuario::class, 'tipus_usuaris_id');
    }
}
