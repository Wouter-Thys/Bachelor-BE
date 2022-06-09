<?php

namespace App\Models;

use Database\Factories\RentTerrainFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\RentTerrain
 *
 * @property int $id
 * @property int $user_id
 * @property int $terrain_id
 * @property string $startDate
 * @property string $endDate
 * @property string $approvalStatus
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static RentTerrainFactory factory(...$parameters)
 * @method static Builder|RentTerrain newModelQuery()
 * @method static Builder|RentTerrain newQuery()
 * @method static Builder|RentTerrain query()
 * @method static Builder|RentTerrain whereApprovalStatus($value)
 * @method static Builder|RentTerrain whereCreatedAt($value)
 * @method static Builder|RentTerrain whereEndDate($value)
 * @method static Builder|RentTerrain whereId($value)
 * @method static Builder|RentTerrain whereStartDate($value)
 * @method static Builder|RentTerrain whereTerrainId($value)
 * @method static Builder|RentTerrain whereUpdatedAt($value)
 * @method static Builder|RentTerrain whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Terrain|null $campVisa
 * @property-read \App\Models\Terrain $terrain
 * @property-read \App\Models\User $user
 */
class RentTerrain extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'terrain_id',
        'camp_visa_id',
        'startDate',
        'endDate',
    ];

    public function terrain(): BelongsTo
    {
        return $this->belongsTo(Terrain::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function campVisa(): HasOne
    {
        return $this->hasOne(CampVisa::class);
    }
}
