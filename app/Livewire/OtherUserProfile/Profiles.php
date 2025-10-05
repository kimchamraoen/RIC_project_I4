<?php

namespace App\Livewire\OtherUserProfile;

use App\Livewire\UserProfile\ProfileInfo;
use App\Models\AboutMe;
use App\Models\Affiliation;
use App\Models\ProfileInformation;
use App\Models\User;
use Livewire\Component;

class Profiles extends Component
{
    public User $user;
    public $profileInfo; 
    public $aboutMe;
    public $affiliation;

    public function mount(User $user)
    {
        $this->user = $user;

        // NOTE: $user->profile must match the relationship name on your User model.
        $this->profileInfo = $user->profileInformation ?? new ProfileInfo(); 
        $this->aboutMe = $user->aboutMe ?? new AboutMe();
        $this->affiliation = $user->affiliation ?? new Affiliation();
    }
    
    
    public function render()
    {
        return view('livewire.other-user-profile.profiles');
    }
}
