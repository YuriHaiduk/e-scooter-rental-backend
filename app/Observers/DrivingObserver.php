<?php

namespace App\Observers;

use App\Models\Driving;

class DrivingObserver
{
    public function creating(Driving $driving): void
    {
        if (auth()->check()) {
            $driving->user_id = auth()->id();
        }
        $driving->start_time = now();
    }
}
