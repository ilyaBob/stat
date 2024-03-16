<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Delivery;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class TransactionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'model_id' => Delivery::query()->inRandomOrder()->pluck('id')->random(),
            'model_type' => 'delivery',
            'user_id' => User::query()->inRandomOrder()->pluck('id')->first(),
            'product_id' => Product::query()->inRandomOrder()->pluck('id')->random(),
            'client_id' => Client::query()->inRandomOrder()->pluck('id')->random(),
            'status' => 1,
            'amount' => rand(5, 10),
            'price_for_unit' => rand(10, 100),

        ];
    }
}
