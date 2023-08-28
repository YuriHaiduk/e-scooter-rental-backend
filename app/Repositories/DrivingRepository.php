<?php

namespace App\Repositories;

use App\Models\Driving;

class DrivingRepository
{
    public function getStoppedDrivings()
    {
        return Driving::stopped()
            ->with('scooter.type')
            ->latest('stop_time')
            ->paginate();
    }

    public function getActiveDrivings()
    {
        return Driving::active()->latest('start_time')->paginate();
    }

    public function isScooterAlreadyActive(int $scooterId): bool
    {
        return Driving::active()->where('scooter_id', $scooterId)->exists();
    }
    
}
