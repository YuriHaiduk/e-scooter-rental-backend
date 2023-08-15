<?php

use App\Models\Type;
use Carbon\Carbon;

if (!function_exists('calculatePrice')) {

    function calculatePrice(int $typeId, string $startTime, string $stopTime = null): int
    {
        $start = new Carbon($startTime);
        $stop = (!is_null($stopTime)) ? new Carbon($stopTime) : now();

        $totalTimeByMinutes = $stop->diffInMinutes($start);

        $priceByMinutes = Type::find($typeId)->price_per_hour / 60;

        return ceil($totalTimeByMinutes * $priceByMinutes);
    }
}
