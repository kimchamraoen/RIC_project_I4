<?php

namespace App\Livewire;

use App\Models\Research;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{
    public $user;
    public $research='';

    public function mount()
    {
        $this->user = Auth::user(); 
        $this->research = Research::orderBy('year', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.home');
    }
}
