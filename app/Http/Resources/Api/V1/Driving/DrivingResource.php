<?php

namespace App\Http\Resources\Api\V1\Driving;

use App\Services\DrivingPriceService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DrivingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $totalPrice = $this->total_price ?? calculatePrice(
            $this->scooter->type->id,
            $this->start_time,
            $this->stop_time
        );

        return [
            'id' => $this->id,
            'scooter' => [
                'id' => $this->scooter->id,
                'plate_number' => $this->scooter->plate_number,
                'type' => [
                    'name' => $this->scooter->type->name,
                    'price_per_hour' => $this->scooter->type->price_per_hour,
                ],
            ],
            'start_time' => $this->start_time->toDateTimeString(),
            'stop_time' => $this->stop_time?->toDateTimeString(),
            'total_price' => $totalPrice,
        ];
    }
}
