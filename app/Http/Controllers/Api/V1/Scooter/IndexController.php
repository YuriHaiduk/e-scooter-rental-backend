<?php

namespace App\Http\Controllers\Api\V1\Scooter;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Scooter\ScooterListResource;
use App\Models\Scooter;
use Illuminate\Http\Resources\Json\ResourceCollection;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): ResourceCollection
    {
        $scooters = Scooter::with('type')->paginate();
        return ScooterListResource::collection($scooters);
    }
}
