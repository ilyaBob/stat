<?php

namespace Database\Seeders;

use App\Models\Delivery;
use Illuminate\Database\Seeder;

class DeliverySeeder extends Seeder
{
    public function run(): void
    {
       Delivery::factory(5)->create();
    }
}
