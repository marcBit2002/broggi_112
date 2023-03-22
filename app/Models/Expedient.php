<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expedient extends Model
{
    use HasFactory;

    protected $table = 'expedients';
    public $timestamps = false;

    /**
     * Get the estatExpedient that owns the Expedient
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estatExpedient()
    {
        return $this->belongsTo(EstatExpedient::class, 'estat_expedients_id');
    }
}
