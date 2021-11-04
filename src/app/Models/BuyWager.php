<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BuyWager
 *
 * @property int $id
 * @property int $wager_id
 * @property int $buying_price
 * @property \Illuminate\Support\Carbon|null $bought_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Wager|null $wager
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
class BuyWager extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'wager_id', 'buying_price',
    ];
    protected $table = 'buy_wager';
    const CREATED_AT = 'bought_at';
}
