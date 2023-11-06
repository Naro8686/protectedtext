<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Bip
 *
 * @property int $id
 * @property int $num
 * @property string $lang
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Bip newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bip newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bip query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bip whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bip whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bip whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bip whereNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bip whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bip whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Bip extends Model
{
    use HasFactory;

    protected $guarded = [];
}
