<?php

namespace App\Livewire\OtherUserProfile;

use Livewire\Component;
use App\Models\User;
use App\Models\ProfileInformation;
use App\Models\AboutMe;
use App\Models\Affiliation;
use App\Models\Research;
use Illuminate\Support\Collection;

class ProfileInfos extends Component
{
    // The user being viewed
    public User $user;

    // Profile info (Eloquent model)
    public ?ProfileInformation $profileInfo = null;

    // About Me section
    public ?AboutMe $aboutMe = null;

    // Affiliation section
    public ?Affiliation $affiliation = null;

    // Research collection
    public Collection $research;

    /**
     * Mount the component with the user from the route
     */
    public function mount(User $user)
    {
        // Use the user passed from the route
        $this->user = $user->load(['profileInformation', 'aboutMe', 'affiliation', 'research']);

        $this->profileInfo = $this->user->profileInformation ?? new ProfileInformation();
        $this->aboutMe = $this->user->aboutMe ?? new AboutMe();
        $this->affiliation = $this->user->affiliation ?? new Affiliation();
        $this->research = $this->user->research ?? collect();
    }


    /**
     * Render the Livewire view
     */
    public function render()
    {
        return view('livewire.other-user-profile.profile-infos');
    }
}
