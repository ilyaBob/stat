<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $status
 * @property string $date_trade
 */
class Trade extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'status',
        'date_trade',
    ];

    public function tradeProducts(): HasMany
    {
        return $this->hasMany(TradeProduct::class);
    }

    public function getProductsInfo(): array
    {
        $data = ['total_price' => 0];

        foreach ($this->tradeProducts as $tradeProduct) {
            $totalProductSold = $tradeProduct->initial_quantity - $tradeProduct->final_quantity;
            $totalPriceProduct = $totalProductSold * $tradeProduct->price_for_unit;

            $data['items'][] = [
                'title' => $tradeProduct->products->title,
                'unit' => $tradeProduct->products->unit,
                'total_product_sold' => $totalProductSold,
                'total_volume_remaining_product' => $tradeProduct->final_quantity,
                'total_price_product' => $totalPriceProduct,
            ];

            $data['total_price'] += $totalPriceProduct;
        }

        return $data;
    }
}
