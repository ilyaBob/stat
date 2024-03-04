<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

/**
 * 
 *
 * @property integer $trade_id
 * @property integer $product_id
 * @property numeric $initial_quantity
 * @property numeric $final_quantity
 * @property Product|Collection $products
 * @property int $id
 * @property int $price_for_unit
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TradeProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TradeProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TradeProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|TradeProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeProduct whereFinalQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeProduct whereInitialQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeProduct wherePriceForUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeProduct whereTradeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TradeProduct extends Model
{
    public $timestamps = true;

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
