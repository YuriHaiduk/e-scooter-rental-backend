<?php

namespace App\Http\Controllers\Api\V1\Driving;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Driving\StartDrivingRequest;
use App\Http\Resources\Api\V1\Driving\DrivingResource;
use App\Models\Driving;
use App\Repositories\DrivingRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class StartController extends Controller
{
    public function __invoke(StartDrivingRequest $request, DrivingRepository $drivingRepository): JsonResponse|DrivingResource
    {
        $drivingData = $request->validated();
        $scooterId = $drivingData['scooter_id'];

        if ($drivingRepository->isScooterAlreadyActive($scooterId)) {
            return response()->json([
                'errors' => ['You cannot start driving twice using the same scooter.'],
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $driving = Driving::create($drivingData);

        return DrivingResource::make($driving);
    }
}
