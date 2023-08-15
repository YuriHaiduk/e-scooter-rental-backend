<?php

namespace App\Http\Controllers\Api\V1\Driving;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Driving\DrivingResource;
use App\Models\Driving;
use App\Services\DrivingPriceService;

class StopController extends Controller
{
    public function __invoke(Driving $driving): DrivingResource
    {
        $driving->update([
            'stop_time'   => now(),
            'total_price' => calculatePrice($driving->scooter->type->id, $driving->start_time),
        ]);

        return DrivingResource::make($driving);
    }
}
