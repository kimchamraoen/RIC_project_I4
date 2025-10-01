<?php

namespace App\Livewire\UserProfile;

use Livewire\Component;
use App\Models\Education;
use Illuminate\Support\Facades\Auth;

class EducationComponent extends Component
{
    public $institution;
    public $start_month;
    public $start_year;
    public $end_month;  
    public $end_year;
    public $field_of_study;
    public $degree;
    public $country_region;
    public $city;
    public $educations;

    public function mount()
    {
        $this->educations = Education::firstOrCreate(
            ['user_id' => Auth::id()],
            [
                'institution' => null,
                'start_month' => null,
                'start_year' => null,
                'end_month' => null,
                'end_year' => null,
                'field_of_study' => null,
                'degree' => null,
                'country_region' => null,
                'city' => null,
            ]
        );

        $this->institution = $this->educations->institution ?? null;
        $this->start_month = $this->educations->start_month ?? null;
        $this->start_year = $this->educations->start_year ?? null;
        $this->end_month = $this->educations->end_month ?? null;
        $this->end_year = $this->educations->end_year ?? null;
        $this->field_of_study = $this->educations->field_of_study ?? null;
        $this->degree = $this->educations->degree ?? null;
        $this->country_region = $this->educations->country_region ?? null;
        $this->city = $this->educations->city ?? null;

        // $this->resetFields();
    }

    public function resetFields()
    {
        $this->institution = '';
        $this->start_month = '';
        $this->start_year = ''; 
        $this->end_month = '';
        $this->end_year = '';
        $this->field_of_study = '';
        $this->degree = '';
        $this->country_region = '';
        $this->city = '';
    }

    public function update()
    {
        $this->validate([
            'institution' => 'nullable|string|max:255',
            'start_month' => 'nullable|string|max:50',
            'start_year' => 'nullable|integer|min:1900|max:' . (date('Y') + 10),
            'end_month' => 'nullable|string|max:50',
            'end_year' => 'nullable|integer|min:1900|max:' . (date('Y') + 10),
            'field_of_study' => 'nullable|string|max:255',
            'degree' => 'nullable|string|max:255',
            'country_region' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
        ]);

        $this->educations->update([
            'institution' => $this->institution,
            'start_month' => $this->start_month,
            'start_year' => $this->start_year,
            'end_month' => $this->end_month,
            'end_year' => $this->end_year,
            'field_of_study' => $this->field_of_study,
            'degree' => $this->degree,
            'country_region' => $this->country_region,
            'city' => $this->city,
        ]);

        session()->flash('message', 'Education details updated successfully.');
    }

    public function render()
    {
        return view('livewire.user-profile.education-component');
    }
}
