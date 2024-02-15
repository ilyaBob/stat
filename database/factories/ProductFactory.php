<?php

namespace Database\Factories;

use App\Models\Enum\ProductEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'quantity_per_unit' => rand(1, 10),
            'unit' => ProductEnum::getListUnits()[rand(0, count(ProductEnum::getListUnits()) - 1)],
            'price' => rand(100, 300),
        ];
    }
}
