<?php

namespace App\Http\Controllers\Api\V1\Driving;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Driving\DrivingResource;
use App\Models\Driving;
use Illuminate\Http\Resources\Json\ResourceCollection;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): ResourceCollection
    {
        $activeDrivings = Driving::active()->latest('start_time')->paginate();

        return DrivingResource::collection($activeDrivings);
    }
}
