<?php

namespace App\Http\Controllers\Api\V1\Driving;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Driving\DrivingResource;
use App\Models\Driving;
use Illuminate\Http\Resources\Json\ResourceCollection;

class HistoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): ResourceCollection
    {
        $stoppedDrivings = Driving::stopped()
            ->with('scooter.type')
            ->latest('stop_time')
            ->paginate();

        return DrivingResource::collection($stoppedDrivings);
    }
}
