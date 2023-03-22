<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\TipusIncident;

class Incident extends Model
{
    use HasFactory;
    protected $table = 'incidents';
    public $timestamps = false;

    public function tipus_incidents(): BelongsTo
    {
        return $this->belongsTo(TipusIncident::class, 'tipus_incidents_id');
    }
}
