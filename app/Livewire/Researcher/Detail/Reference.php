<?php

namespace App\Livewire\Researcher\Detail;

use App\Models\Research;
use App\Models\User;
use Livewire\Component;

class Reference extends Component
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
        return view('livewire.researcher.detail.reference');
    }
}
