<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CampVisaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tents' => $this->tents,
            'activities' => $this->activities,
            'theme' => $this->theme,
            'camp_booklet' => $this->camp_booklet,
            'forest_permission' => $this->forest_permission,
            'municipality_contact' => $this->municipality_contact,
            'fire_agency_contact' => $this->fire_agency_contact,
            'tools' => $this->tools,
            'parents_info_session' => $this->parents_info_session,
            'leaders_info_session' => $this->leaders_info_session,
            'extra_info_session' => $this->extra_info_session,
            'fire_insurance' => $this->fire_insurance,
            'transport_insurance' => $this->transport_insurance,
            'persons_insurance' => $this->persons_insurance,
            'cars_insurance' => $this->cars_insurance,
            'theft_insurance' => $this->theft_insurance,
            'tools_insurance' => $this->tools_insurance,
            'social_assistance_insurance' => $this->social_assistance_insurance,
            'group_equipment_insurance' => $this->group_equipment_insurance,
            'medical_assistance_certificate' => $this->medical_assistance_certificate,
            'camp_registration' => $this->camp_registration,
            'final_contact_landlord' => $this->final_contact_landlord,
        ];
    }
}
