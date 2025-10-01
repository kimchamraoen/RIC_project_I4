<?php

namespace App\Livewire\UserProfile;

use App\Models\Grant;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GrantComponent extends Component
{
    public $grants;
    public $award_type;
    public $title;
    public $month_start_date;
    public $year_start_date;
    public $month_end_date;
    public $year_end_date;
    public $currency;
    public $amount;
    public $funding_agency;
    public $grant_reference;
    public $principal_investigators;
    public $co_investigators;
    public $institution;
    public $secondary_institutions;

    public function mount()
    {
        $this->grants = Grant::firstOrCreate (
            ['user_id' => Auth::id()],
            [
                'award_type' => null,
                'title' => null,
                'month_start_date' => null,
                'year_start_date' => null,
                'month_end_date' => null,
                'year_end_date' => null,
                'currency' => null,
                'amount' => null,
                'funding_agency' => null,
                'grant_reference' => null,
                'principal_investigators' => null,
                'co_investigators' => null,
                'institution' => null,
                'secondary_institutions' => null,
            ]
        );

        $this->award_type = $this->grants->award_type ?? null;
        $this->title = $this->grants->title ?? null;
        $this->month_start_date = $this->grants->month_start_date ?? null;
        $this->year_start_date = $this->grants->year_start_date ?? null;
        $this->month_end_date = $this->grants->month_end_date ?? null;
        $this->year_end_date = $this->grants->year_end_date ?? null;
        $this->currency = $this->grants->currency ?? null;
        $this->amount = $this->grants->amount ?? null;
        $this->funding_agency = $this->grants->funding_agency ?? null;
        $this->grant_reference = $this->grants->grant_reference ?? null;
        $this->principal_investigators = $this->grants->principal_investigators ?? null;
        $this->co_investigators = $this->grants->co_investigators ?? null;
        $this->institution = $this->grants->institution ?? null;
        $this->secondary_institutions = $this->grants->secondary_institutions ?? null;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'award_type' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'month_start_date' => 'nullable|string|max:50',
            'year_start_date' => 'nullable|string|max:50',
            'month_end_date' => 'nullable|string|max:50',
            'year_end_date' => 'nullable|string|max:50',
            'currency' => 'nullable|string|max:10',
            'amount' => 'nullable|string|max:100',
            'funding_agency' => 'nullable|string|max:255',
            'grant_reference' => 'nullable|string|max:255',
            'principal_investigators' => 'nullable|string|max:255',
            'co_investigators' => 'nullable|string|max:255',
            'institution' => 'nullable|string|max:255',
            'secondary_institutions' => 'nullable|string|max:255',
        ]);

        $this->grants->update($validatedData);

        session()->flash('message', 'Grant information updated successfully.');
    }
    
    public function render()
    {
        return view('livewire.user-profile.grant-component');
    }
}
