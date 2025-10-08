<?php

namespace App\Livewire\UserProfile;

use App\Livewire\Research\Addresearch;
use App\Models\Research;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $user; 
    public $research;

    public function mount()
    {
        // 1. Get the currently authenticated user
        $authenticatedUser = Auth::user();

        // 2. Check if the user is logged in
        if (!$authenticatedUser) {
            // Log for debugging: User not authenticated
            \Illuminate\Support\Facades\Log::info('Profile component loaded, but user not authenticated.');
            
            $this->user = new User(); 
            $this->research = collect();
            return; 
        }
        
        // Log for debugging: Show the ID being used for the query
        \Illuminate\Support\Facades\Log::info('Profile component loaded for User ID: ' . $authenticatedUser->id);


        // 3. Load the authenticated user and eager load research
        $this->user = $authenticatedUser->load('research');

        // 4. Assign the collection of research items
        $this->research = $this->user->research; 

        // Log for debugging: Show the count of research found
        \Illuminate\Support\Facades\Log::info('Research records found: ' . $this->research->count());
    }
    
    public function render()
    {
        return view('livewire.user-profile.profile');
    }
}
