<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatExpedient extends Model
{
    use HasFactory;

    protected $table = 'estat_expedients';
    public $timestamps = false;

    /**
     * Get all of the expedient for the EstatExpedient
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function expedient()
    {
        return $this->hasMany(Expedient::class, 'estat_expedient_id');
    }
}
