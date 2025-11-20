<?php

namespace App\Livewire\Guestpage;
use App\Models\User;
use App\Livewire\UserProfile\ProfileInfo;
use App\Models\AboutMe;
use App\Models\Affiliation;
use App\Models\ProfileInformation;

use Livewire\Component;

class Authors extends Component
{
    public $authors;
    public $questions;
    public function mount()  // receives the {user} from the route
    {
       $this->authors = User::with([
        'affiliation',
        'profileInformation',
        '$skills',
        'questions',// for profile picture
    ])->get();
    }
    public function render()
    {
        return view('livewire.guestpage.authors', ['authors' => $this->authors]);
    }
}
