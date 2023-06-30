<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Driving extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'scooter_id', 'start_time', 'stop_time', 'total_price'];

    protected $casts = [
        'start_time' => 'datetime',
        'stop_time'  => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scooter(): BelongsTo
    {
        return $this->belongsTo(Scooter::class);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->whereNull('stop_time');
    }

    public function scopeStopped(Builder $query): Builder
    {
        return $query->whereNotNull('stop_time');
    }

    protected static function booted()
    {
        static::addGlobalScope('user', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        });
    }

}
