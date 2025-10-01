<?php

namespace App\Livewire\UserProfile;

use Livewire\Component;
use App\Models\Orcid;
use Illuminate\Support\Facades\Auth;

class OrcidComponent extends Component
{
    public $orcid;
    public $orcids;

    public function mount()
    {
        $this->orcids = Orcid::firstOrCreate(
            ['user_id' => Auth::id()],
            [
                'orcid' => null,
            ]
        );

        $this->orcid = $this->orcids->orcid ?? null;
    }

    public function save()
    {
        $validatedData = $this->validate([
            'orcid' => 'nullable|string|max:255',
        ]);

        $this->orcids->update($validatedData);

        session()->flash('message', 'ORCID information updated successfully.');
    }

    public function render()
    {
        return view('livewire.user-profile.orcid-component');
    }
}
