<?php

namespace App\Livewire\OtherUserProfile;

use App\Livewire\UserProfile\ProfileInfo;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Locked;

class ProfileInfos extends Component
{
    public User $user;
    public $profileInfo; 

    public function mount(User $user)
    {
        $this->user = $user;

        // NOTE: $user->profile must match the relationship name on your User model.
        $this->profileInfo = $user->profileInformation ?? new ProfileInfo(); 
    }

    public function render()
    {
        return view('livewire.other-user-profile.profile-infos');
    }
}
