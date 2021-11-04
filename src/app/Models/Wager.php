<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Wager
 *
 * @property int $id
 * @property int $total_wager_value
 * @property int $odds
 * @property int $selling_percentage
 * @property float $selling_price
 * @property float current_selling_price
 * @property int percentage_sold
 * @property int amount_sold
 * @property \Illuminate\Support\Carbon|null $placed_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter(array $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|Wager newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wager newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wager query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel sort()
 * @method static \Illuminate\Database\Eloquent\Builder|Wager whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wager whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wager whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wager whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wager whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wager whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wager whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wager whereValue($value)
 * @mixin \Eloquent
 */
class Wager extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'total_wager_value', 'odds', 'selling_percentage', 'selling_price',
        'current_selling_price', 'percentage_sold', 'amount_sold',
    ];
    protected $table = 'wagers';
    const CREATED_AT = 'placed_at';
}
