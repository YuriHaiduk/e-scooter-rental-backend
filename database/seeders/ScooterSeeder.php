<?php

namespace Database\Seeders;

use App\Models\Scooter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Scooter::create(['type' => 'Electric Kick Scooter', 'price_per_hour' => 100]);
        Scooter::create(['type' => 'Self-Balancing E-scooter', 'price_per_hour' => 200]);
        Scooter::create(['type' => 'Electric Moped', 'price_per_hour' => 300]);
    }
}
