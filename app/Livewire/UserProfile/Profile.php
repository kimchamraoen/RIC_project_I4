<?php

namespace App\Livewire\UserProfile;

use App\Livewire\Research\Addresearch;
use App\Models\Research;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\InteractsWithEvents;

class Profile extends Component
{
    public User $user;

    protected $listeners = ['profile-updated-global' => 'refreshUserData'];

    public function mount()
    {
        $this->user = Auth::user();
        $this->user = Auth::user()->fresh();
    }

    public function render()
    {
        return view('livewire.user-profile.profile', ['user' => $this->user]);
    }
}



