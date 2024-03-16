<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $status
 * @property int $number
 * @property string $date_start
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\DeliveryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereDateStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transactions
 * @property-read int|null $transactions_count
 * @mixin \Eloquent
 */
class Delivery extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    protected $fillable = [];
    protected $casts = [
        'delivery_data' => 'timestamp'
    ];

    public function transactions(): MorphMany
    {
        return $this->morphMany(Transaction::class, 'model');
    }

}
