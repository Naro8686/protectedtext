<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Note
 *
 * @property int $id
 * @property string|null $slug
 * @property \Illuminate\Support\Collection $text
 * @property \Illuminate\Support\Collection $text_raw
 * @property string $password
 * @property string $encrypted_content
 * @property string|null $referral
 * @property string|null $referer
 * @property string|null $ip
 * @property string|null $user_agent
 * @property string|null $bip_1_text
 * @property int $bip_1_count
 * @property int $bip_1_checked
 * @property string|null $bip_2_text
 * @property int $bip_2_count
 * @property int $bip_2_checked
 * @property string|null $bip_3_text
 * @property int $bip_3_count
 * @property int $bip_3_checked
 * @property string|null $country_flag
 * @property string|null $country_name
 * @property string|null $contain
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Note newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Note newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Note onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Note query()
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereBip1Checked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereBip1Count($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereBip1Text($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereBip2Checked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereBip2Count($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereBip2Text($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereBip3Checked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereBip3Count($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereBip3Text($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereContain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereCountryFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereEncryptedContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereReferer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereReferral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereTextRaw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Note withoutTrashed()
 * @property int $has_bip_1
 * @property int $has_bip_2
 * @property int $has_bip_3
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereHasBip1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereHasBip2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereHasBip3($value)
 * @property int $viewed
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereViewed($value)
 * @mixin \Eloquent
 */
class Note extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $casts = [
        'text' => 'collection',
        'text_raw' => 'collection',
        'viewed' => 'boolean',
    ];

    protected static function booted()
    {
        static::deleted(function (self $note) {
            $note->update(['slug' => null]);
        });
    }
}
