<?php

namespace App\Models;

use Database\Factories\CampVisaFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\CampVisa
 *
 * @property int $id
 * @property int $rent_terrain_id
 * @property int $tents
 * @property int $activities
 * @property int $theme
 * @property string|null $camp_booklet
 * @property int $forest_permission
 * @property int $municipality_contact
 * @property int $fire_agency_contact
 * @property int $tools
 * @property int $parents_info_session
 * @property int $leaders_info_session
 * @property int $extra_info_session
 * @property int $fire_insurance
 * @property int $transport_insurance
 * @property int $persons_insurance
 * @property int $cars_insurance
 * @property int $theft_insurance
 * @property int $tools_insurance
 * @property int $social_assistance_insurance
 * @property int $group_equipment_insurance
 * @property int $medical_assistance_certificate
 * @property int $camp_registration
 * @property int $final_contact_landlord
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read CampVisa|null $rentTerrain
 * @method static CampVisaFactory factory(...$parameters)
 * @method static Builder|CampVisa newModelQuery()
 * @method static Builder|CampVisa newQuery()
 * @method static Builder|CampVisa query()
 * @method static Builder|CampVisa whereActivities($value)
 * @method static Builder|CampVisa whereCampBooklet($value)
 * @method static Builder|CampVisa whereCampRegistration($value)
 * @method static Builder|CampVisa whereCarsInsurance($value)
 * @method static Builder|CampVisa whereCreatedAt($value)
 * @method static Builder|CampVisa whereExtraInfoSession($value)
 * @method static Builder|CampVisa whereFinalContactLandlord($value)
 * @method static Builder|CampVisa whereFireAgencyContact($value)
 * @method static Builder|CampVisa whereFireInsurance($value)
 * @method static Builder|CampVisa whereForestPermission($value)
 * @method static Builder|CampVisa whereGroupEquipmentInsurance($value)
 * @method static Builder|CampVisa whereId($value)
 * @method static Builder|CampVisa whereLeadersInfoSession($value)
 * @method static Builder|CampVisa whereMedicalAssistanceCertificate($value)
 * @method static Builder|CampVisa whereMunicipalityContact($value)
 * @method static Builder|CampVisa whereParentsInfoSession($value)
 * @method static Builder|CampVisa wherePersonsInsurance($value)
 * @method static Builder|CampVisa whereRentTerrainId($value)
 * @method static Builder|CampVisa whereSocialAssistanceInsurance($value)
 * @method static Builder|CampVisa whereTents($value)
 * @method static Builder|CampVisa whereTheftInsurance($value)
 * @method static Builder|CampVisa whereTheme($value)
 * @method static Builder|CampVisa whereTools($value)
 * @method static Builder|CampVisa whereToolsInsurance($value)
 * @method static Builder|CampVisa whereTransportInsurance($value)
 * @method static Builder|CampVisa whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CampVisa extends Model
{
    use HasFactory;

    protected $fillable = [
        'rent_terrain_id',
        'tents',
        'activities',
        'theme',
        'camp_booklet',
        'forest_permission',
        'municipality_contact',
        'fire_agency_contact',
        'tools',
        'parents_info_session',
        'leaders_info_session',
        'extra_info_session',
        'fire_insurance',
        'transport_insurance',
        'persons_insurance',
        'cars_insurance',
        'theft_insurance',
        'tools_insurance',
        'social_assistance_insurance',
        'group_equipment_insurance',
        'medical_assistance_certificate',
        'camp_registration',
        'final_contact_landlord',
    ];

    public function rentTerrain(): BelongsTo
    {
        return $this->belongsTo(Terrain::class);
    }
}
