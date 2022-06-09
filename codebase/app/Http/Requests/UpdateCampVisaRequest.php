<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCampVisaRequest extends FormRequest
{
    public function rules()
    {
        return [
            'tents' => ['required', 'boolean'],
            'activities' => ['required', 'boolean'],
            'theme' => ['required', 'boolean'],
            'camp_booklet' => ['required', 'boolean'],
            'forest_permission' => ['required', 'boolean'],
            'municipality_contact' => ['required', 'boolean'],
            'fire_agency_contact' => ['required', 'boolean'],
            'tools' => ['required', 'boolean'],
            'parents_info_session' => ['required', 'boolean'],
            'leaders_info_session' => ['required', 'boolean'],
            'extra_info_session' => ['required', 'boolean'],
            'fire_insurance' => ['required', 'boolean'],
            'transport_insurance' => ['required', 'boolean'],
            'persons_insurance' => ['required', 'boolean'],
            'cars_insurance' => ['required', 'boolean'],
            'theft_insurance' => ['required', 'boolean'],
            'social_assistance_insurance' => ['required', 'boolean'],
            'group_equipment_insurance' => ['required', 'boolean'],
            'medical_assistance_certificate' => ['required', 'boolean'],
            'camp_registration' => ['required', 'boolean'],
            'final_contact_landlord' => ['required', 'boolean'],
        ];
    }
}
