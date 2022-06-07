<?php

namespace App\Models;

use Database\Factories\TerrainFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Terrain
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string|null $description
 * @property string $street
 * @property string $streetNumber
 * @property string $postcode
 * @property string $province
 * @property string $locality
 * @property int $water
 * @property int $electricity
 * @property int $threePhaseElectricity
 * @property int $sanitaryBlock
 * @property int $showers
 * @property int $toilets
 * @property int $sinks
 * @property int $capacity
 * @property int $hectare
 * @property int $supermarket_rating
 * @property int $activities_rating
 * @property int $remote_rating
 * @property int $bakery_rating
 * @property int $firstAid_rating
 * @property-read \App\Models\User|null $user
 * @method static TerrainFactory factory(...$parameters)
 * @method static Builder|Terrain newModelQuery()
 * @method static Builder|Terrain newQuery()
 * @method static Builder|Terrain query()
 * @method static Builder|Terrain whereActivitiesRating($value)
 * @method static Builder|Terrain whereCreatedAt($value)
 * @method static Builder|Terrain whereDescription($value)
 * @method static Builder|Terrain whereElectricity($value)
 * @method static Builder|Terrain whereHectare($value)
 * @method static Builder|Terrain whereId($value)
 * @method static Builder|Terrain whereLocality($value)
 * @method static Builder|Terrain whereMaxPeople($value)
 * @method static Builder|Terrain whereName($value)
 * @method static Builder|Terrain whereFirstAidRating($value)
 * @method static Builder|Terrain wherePostcode($value)
 * @method static Builder|Terrain whereProvince($value)
 * @method static Builder|Terrain whereRemoteRating($value)
 * @method static Builder|Terrain whereSanitaryBlock($value)
 * @method static Builder|Terrain whereShowers($value)
 * @method static Builder|Terrain whereSinks($value)
 * @method static Builder|Terrain whereStreet($value)
 * @method static Builder|Terrain whereStreetNumber($value)
 * @method static Builder|Terrain whereSupermarketRating($value)
 * @method static Builder|Terrain whereThreePhaseElectricity($value)
 * @method static Builder|Terrain whereToilets($value)
 * @method static Builder|Terrain whereUpdatedAt($value)
 * @method static Builder|Terrain whereWater($value)
 * @method static Builder|Terrain whereWoodRating($value)
 * @mixin \Eloquent
 * @property int $user_id
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static Builder|Terrain whereUserId($value)
 * @property float|null $latitude
 * @property float|null $longitude
 * @method static Builder|Terrain whereLatitude($value)
 * @method static Builder|Terrain whereLongitude($value)
 * @property int $google_supermarket_rating
 * @property int $google_activities_rating
 * @property int $google_remote_rating
 * @property int $google_bakery_rating
 * @property int $google_firstAid_rating
 * @method static Builder|Terrain whereBakeryRating($value)
 * @method static Builder|Terrain whereGoogleActivitiesRating($value)
 * @method static Builder|Terrain whereGoogleBakeryRating($value)
 * @method static Builder|Terrain whereGoogleFirstAidRating($value)
 * @method static Builder|Terrain whereGoogleRemoteRating($value)
 * @method static Builder|Terrain whereGoogleSupermarketRating($value)
 */
class Terrain extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        "user_id",
        "name",
        "description",
        "street",
        "streetNumber",
        "postcode",
        "province",
        "locality",
        "latitude",
        "longitude",
        "water",
        "electricity",
        "threePhaseElectricity",
        "sanitaryBlock",
        "showers",
        "toilets",
        "sinks",
        "openFire",
        "hudo",
        "digging",
        "capacity",
        "hectare",
        "supermarket_rating",
        "activities_rating",
        "remote_rating",
        "bakery_rating",
        "firstAid_rating",
        "google_supermarket_rating",
        "google_activities_rating",
        "google_remote_rating",
        "google_bakery_rating",
        "google_firstAid_rating",
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('terrainImages')->useDisk('terrainImages');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('crop')
            ->crop('crop-center', 200, 200);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function rentTerrains(): HasMany
    {
        return $this->hasMany(RentTerrain::class);
    }
}
