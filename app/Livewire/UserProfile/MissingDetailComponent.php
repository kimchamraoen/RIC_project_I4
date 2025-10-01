<?php

namespace App\Livewire\UserProfile;

use Livewire\Component;
use App\Models\Missing_detail;
use Illuminate\Support\Facades\Auth;

class MissingDetailComponent extends Component
{
    public $institute;
    public $department;
    public $position;
    public $primary_affiliation_month;
    public $primary_affiliation_year;
    public $country_region;
    public $city;
    public $description;
    public $missings;

    public function mount()
    {
        $this->missings = Missing_detail::firstOrCreate(
            ['user_id' => Auth::id()],
            [
                'institute' => null,
                'department' => null,
                'position' => null,
                'primary_affiliation_month' => null,
                'primary_affiliation_year' => null,
                'country_region' => null,
                'city' => null,
                'description' => null,
            ]
        );

        $this->institute = $this->missings->institute ?? null;
        $this->department = $this->missings->department ?? null;
        $this->position = $this->missings->position ?? null;
        $this->primary_affiliation_month = $this->missings->primary_affiliation_month   ?? null;
        $this->primary_affiliation_year = $this->missings->primary_affiliation_year ?? null;
        $this->country_region = $this->missings->country_region     ?? null;
        $this->city = $this->missings->city   ?? null;
        $this->description = $this->missings->description  ?? null;

        $this->resetFields();
    }

    public function resetFields()
    {
        $this->institute = $this->missings->institute ?? null;
        $this->department = $this->missings->department ?? null;
        $this->position = $this->missings->position ?? null;
        $this->primary_affiliation_month = $this->missings->primary_affiliation_month ?? null;
        $this->primary_affiliation_year = $this->missings->primary_affiliation_year ?? null;
        $this->country_region = $this->missings->country_region ?? null;
        $this->city = $this->missings->city ?? null;
        $this->description = $this->missings->description ?? null;
    }

    public function save(){
        $validatedData = $this->validate([
            'institute' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'primary_affiliation_month' => 'nullable|string|max:255',
            'primary_affiliation_year' => 'nullable|integer|min:1900|max:2100',
            'country_region' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $this->missings->update($validatedData);

        $missings = Missing_detail::firstOrCreate(['user_id' => Auth::id()]);

        $missings->institute = $this->institute;
        $missings->department = $this->department;
        $missings->position = $this->position;
        $missings->primary_affiliation_month = $this->primary_affiliation_month;
        $missings->primary_affiliation_year = $this->primary_affiliation_year;
        $missings->country_region = $this->country_region;
        $missings->city = $this->city;
        $missings->description = $this->description;
        $missings->save();

        session()->flash('message', 'Details updated successfully.');
    }

    public function render()
    {
        return view('livewire.user-profile.missing-detail-component');
    }
}
