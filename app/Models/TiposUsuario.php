<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TiposUsuario extends Model
{
    use HasFactory;
    protected $table = "tipus_usuaris";
    public $timestamps = false;

    public function usuarios(): HasMany
    {
        return $this->hasMany(Usuario::class, 'tipus_usuaris_id');
    }
}
