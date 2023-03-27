<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comarca extends Model
{
    use HasFactory;
    protected $table =  'comarques';
    public $timestamps = false;

    public function provincies(): BelongsTo
    {
        return $this->belongsTo(Provincia::class, 'provincies_id');
    }

    public function municipis()
    {
        return $this->hasMany(Municipi::class, 'comarques_id');
    }
}
