<?php

namespace App\Livewire\Components;

use App\Models\User;
use Livewire\Component;

class OtherUserNavigatePage extends Component
{
    public User $user;
    public $profileInfo; 
    public $aboutMe;

    public function mount(User $user)
    {
        $this->user = $user;

        // NOTE: $user->profile must match the relationship name on your User model.
        // $this->profileInfo = $user->profileInformation ?? new ProfileInfo(); 
        // $this->aboutMe = $user->aboutMe ?? new AboutMe();
    }

    public function render()
    {
        return view('livewire.components.other-user-navigate-page');
    }
}
