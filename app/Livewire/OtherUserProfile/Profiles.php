<?php

namespace App\Livewire\OtherUserProfile;

use App\Livewire\UserProfile\ProfileInfo;
use App\Models\AboutMe;
use App\Models\Affiliation;
use App\Models\ProfileInformation;
use App\Models\Research;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profiles extends Component
{
    public User $user;           // the user
    public $research;            // their research collection


    public function mount(User $user)  // receives the {user} from the route
    {
        $this->user = $user;
        $this->research = $user->research()->get();
    }

    public function render()
    {
        return view('livewire.other-user-profile.profiles', [
            'user' => $this->user,       // ✅ use $this->user
            'research' => $this->research
        ]);
    }
}
