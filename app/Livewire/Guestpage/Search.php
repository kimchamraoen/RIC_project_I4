<?php

namespace App\Livewire\Guestpage;
use App\Models\Research;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Search extends Component
{
    public $user;
    public $tab = 'publications';

    public $research=[];
    public $authors = [];


    public function mount()
    {
        $this->user = Auth::user(); 
        $this->loadPublications();
    }
    // Load Publications
    public function loadPublications()
    {
        $this->research = Research::orderBy('year', 'desc')->get();
    }
     // Load Authors
    public function loadAuthors()
    {
        $this->authors = User::with('affiliation')->get();
    }
    public function index()
    {
        $questions = Question::latest()->get();
        return view('guestpage.search', compact('questions'));
    }

   // Switch tabs
    public function switchTab($tab)
    {
        $this->tab = $tab;

        if ($tab === 'publications') {
            $this->loadPublications();
        }

        if ($tab === 'authors') {
            $this->loadAuthors();
        }

        if ($tab === 'questions') {
            // static UI — nothing to load
        }
    }

    

    public function render()
    {
        return view('livewire.guestpage.search');
    }
}
