<?php

namespace App\Http\Controllers\Api\V1\Driving;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Driving\StartDrivingRequest;
use App\Http\Resources\Api\V1\Driving\DrivingResource;
use App\Models\Driving;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class StartController extends Controller
{
    public function __invoke(StartDrivingRequest $request): JsonResponse|DrivingResource
    {
        $drivingData = $request->validated();

        if (Driving::active()->where('scooter_id', $drivingData['scooter_id'])->exists()) {
            return response()->json([
                'errors' => ['You can not start driving twice using the same scooter.'],
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $driving = Driving::create($drivingData);

        return DrivingResource::make($driving);
    }
}
