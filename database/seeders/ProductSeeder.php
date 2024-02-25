<?php

namespace Database\Seeders;

use App\Models\Enum\ProductEnum;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function data()
    {
        return [
            [
                'title' => 'Молоко',
                'quantity_per_unit' => '1',
                'unit' => ProductEnum::LITER,
            ],
            [
                'title' => 'Молоко(1.5)',
                'quantity_per_unit' => '1',
                'unit' => ProductEnum::PIECES,
            ],
            [
                'title' => 'Молоко(1)',
                'quantity_per_unit' => '1',
                'unit' => ProductEnum::PIECES,
            ],
            [
                'title' => 'Яйцо (10 шт)',
                'quantity_per_unit' => '1',
                'unit' => ProductEnum::PIECES,
            ],
            [
                'title' => 'Творог (цельный)',
                'quantity_per_unit' => '1',
                'unit' => ProductEnum::KILOGRAM,
            ],
            [
                'title' => 'Творог (обезжиреный)',
                'quantity_per_unit' => '1',
                'unit' => ProductEnum::KILOGRAM,
            ],
            [
                'title' => 'Свинина',
                'quantity_per_unit' => '1',
                'unit' => ProductEnum::KILOGRAM,
            ],
            [
                'title' => 'Говядина',
                'quantity_per_unit' => '1',
                'unit' => ProductEnum::KILOGRAM,
            ],
            [
                'title' => 'Масло',
                'quantity_per_unit' => '1',
                'unit' => ProductEnum::KILOGRAM,
            ],
        ];
    }

    public function run(): void
    {
        foreach ($this->data() as $product) {
            Product::create([
                'title' => $product['title'],
                'quantity_per_unit' => $product['quantity_per_unit'],
                'unit' => $product['unit'],
            ]);
        }

    }
}
