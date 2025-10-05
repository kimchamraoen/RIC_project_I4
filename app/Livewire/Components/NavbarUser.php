<?php

namespace App\Livewire\Components;

use App\Models\ProfileInformation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class NavbarUser extends Component
{   
    protected $listeners = ['profile-updated' => 'loadProfile'];

    public $profilePhotoUrl;

    public function mount()
    {
        $this->loadProfile();
    }

    public function loadProfile()
    {
        $userId = Auth::id();
        $profile = ProfileInformation::where('user_id', $userId)->first();

        $this->profilePhotoUrl = $profile && $profile->image
            ? Storage::url($profile->image)
            : asset('images/default_profile.png');
    }

    public function render()
    {
        return view('livewire.components.navbar-user');
    }
}
