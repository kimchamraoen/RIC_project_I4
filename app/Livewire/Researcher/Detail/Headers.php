<?php

namespace App\Livewire\Researcher\Detail;

use App\Models\Research;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Affiliation;
use App\Models\ProfileInformation;
use App\Livewire\UserProfile\ProfileInfo;
use Livewire\Component;

class Headers extends Component
{
    public Research $research;
    public $authors=[];

    public function mount(Research $research)
    {
        // $this->research = User::with([authors,])->get(); // Fetch data here
         $this->research = $research;

        // Use your authorsList() function
        $this->authors = $research->authorsList()->load('profileInformation');
    }

    public function render()
    {
        return view('livewire.researcher.detail.headers',['authors' => $this->authors]);
    }
}
