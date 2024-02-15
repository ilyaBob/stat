<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $title
 * @property numeric $quantity_per_unit
 * @property string $unit
 * @property int $price
 * @property string $created_at
 * @property string $updated_at
 */
class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    protected $fillable = [
        'title',
        'quantity_per_unit',
        'unit',
        'price',
    ];
}
