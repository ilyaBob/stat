<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

/**
 * @property integer $trade_id
 * @property integer $product_id
 * @property numeric $initial_quantity
 * @property numeric $final_quantity
 * @property Product|Collection $products
 */
class TradeProduct extends Model
{
    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
