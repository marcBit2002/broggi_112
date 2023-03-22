<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Incident;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipusIncident extends Model
{
    use HasFactory;
    protected $table = "tipus_incidents";
    public $timestamps = false;

    public function incidents(): HasMany
    {
        return $this->hasMany(Incident::class, 'tipus_incidents_id');
    }
}
