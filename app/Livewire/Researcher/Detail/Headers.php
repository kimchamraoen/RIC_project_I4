<?php

namespace App\Livewire\Researcher\Detail;

use App\Models\Research;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Headers extends Component
{
    public Research $research;

    public function mount(Research $research)
    {
        $this->research = $research; // Fetch data here
    }

    public function render()
    {
        return view('livewire.researcher.detail.headers');
    }
}
