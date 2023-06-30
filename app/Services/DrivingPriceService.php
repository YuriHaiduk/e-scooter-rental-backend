<?php

namespace App\Services;

use App\Models\Type;
use Carbon\Carbon;

class DrivingPriceService {

    public static function calculatePrice(int $type_id, string $startTime, string $stopTime = null): int
    {
        $start = new Carbon($startTime);
        $stop = (!is_null($stopTime)) ? new Carbon($stopTime) : now();

        $totalTimeByMinutes = $stop->diffInMinutes($start);

        $priceByMinutes = Type::find($type_id)->price_per_hour / 60;

        return ceil($totalTimeByMinutes * $priceByMinutes);
    }

}
