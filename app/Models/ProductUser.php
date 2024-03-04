<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
class ProductUser extends Model
{
   // use HasFactory;

    protected $fillable = ['price'];

}
