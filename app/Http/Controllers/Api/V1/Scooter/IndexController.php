<?php

namespace App\Http\Controllers\Api\V1\Scooter;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Scooter\ScooterListResource;
use App\Repositories\ScooterRepository;
use Illuminate\Http\Resources\Json\ResourceCollection;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ScooterRepository $scooterRepository): ResourceCollection
    {
        $scooters = $scooterRepository->getAllScooters();

        return ScooterListResource::collection($scooters);
    }
}
