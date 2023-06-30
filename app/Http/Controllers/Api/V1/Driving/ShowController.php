<?php

namespace App\Http\Controllers\Api\V1\Driving;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Driving\DrivingResource;
use App\Models\Driving;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Driving $driving): DrivingResource
    {
        return DrivingResource::make($driving);
    }
}
