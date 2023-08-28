<?php

namespace App\Http\Controllers\Api\V1\Driving;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Driving\DrivingResource;
use App\Repositories\DrivingRepository;
use Illuminate\Http\Resources\Json\ResourceCollection;

class HistoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DrivingRepository $drivingRepository): ResourceCollection
    {
        $stoppedDrivings = $drivingRepository->getStoppedDrivings();

        return DrivingResource::collection($stoppedDrivings);
    }
}
