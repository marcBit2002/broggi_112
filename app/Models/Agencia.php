<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Municipi;

class Agencia extends Model
{
    use HasFactory;
    protected $table =  'agencies';
    public $timestamps = false;

    public function municipis(): BelongsTo
    {
        return $this->belongsTo(Municipi::class, 'municipis_id');
    }
}
