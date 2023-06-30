<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create(['name' => 'Electric Kick Scooter', 'price_per_hour' => 100]);
        Type::create(['name' => 'Self-Balancing E-scooter', 'price_per_hour' => 200]);
        Type::create(['name' => 'Electric Moped', 'price_per_hour' => 300]);
    }
}
