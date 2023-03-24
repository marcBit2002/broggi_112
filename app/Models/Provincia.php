<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provincia extends Model
{
    use HasFactory;
    protected $table = "provincies";
    public $timestamps = false;

    public function comarques(): HasMany
    {
        return $this->hasMany(Comarca::class, 'provincies_id');
    }
}
