<?php

namespace App\Http\Resources\Api\V1\Scooter;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScooterListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'plate_number' => $this->plate_number,
            'type' => $this->type->name,
            'price_per_hour' => $this->type->price_per_hour,
        ];
    }
}
