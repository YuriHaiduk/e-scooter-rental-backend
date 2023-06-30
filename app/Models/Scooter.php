<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Scooter extends Model
{
    use HasFactory;

    protected $fillable = ['type_id', 'plate_number'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
