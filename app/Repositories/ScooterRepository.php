<?php

namespace App\Repositories;

use App\Models\Scooter;

class ScooterRepository
{
    public function getAllScooters()
    {
        return Scooter::with('type')->paginate();
    }
}
