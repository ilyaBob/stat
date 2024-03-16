<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 
 *
 * @property integer $id
 * @property integer $status
 * @property string $date_trade
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TradeProduct> $tradeProducts
 * @property-read int|null $trade_products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Trade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trade onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Trade query()
 * @method static \Illuminate\Database\Eloquent\Builder|Trade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trade whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trade whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trade whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trade whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trade withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Trade withoutTrashed()
 * @mixin \Eloquent
 */
class Trade extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'status',
        'user_id',
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
