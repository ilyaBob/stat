<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ClientFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUserId($value)
 * @mixin \Eloquent
 */
	class Client extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $quantity_per_unit
 * @property string $unit
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $user
 * @property-read int|null $user_count
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereQuantityPerUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product withoutTrashed()
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property string|null $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductUser wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductUser whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductUser whereUserId($value)
 * @mixin \Eloquent
 */
	class ProductUser extends \Eloquent {}
}

namespace App\Models{
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
	class Trade extends \Eloquent {}
}

namespace App\Models{
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
	class TradeProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property Product $products
 * @property string $name
 * @property string $role
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

