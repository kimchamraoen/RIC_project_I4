<?php

namespace App\Livewire\UserProfile;

use App\Models\Skill;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SkillComponent extends Component
{
    // The property bound to the multi-select form field
    public array $skill = []; 
    public $language, $skills;

    // All available options for the dropdown
    public array $availableDisciplines = [
        'math' => 'Mathematics',
        'science' => 'Science',
        'history' => 'History',
        'art' => 'Art',
        'computer' => 'Computer Science',
    ];

    public function mount(){
        // Get the existing skill model for the logged-in user
        $this->skills = Skill::firstOrCreate(
            ['user_id' => Auth::id()],
            [
                'skill' => [],
                'language' => null,
            ]
        );
        
        // Load the array from the database into the public property
        $this->skill = $this->skills->skill ?? [];
        $this->language = $this->skills->language ?? null;
    }

    // This method is now much cleaner.
    public function update(){
        $validatedData = $this->validate([
            // Ensure Livewire validates the $skill property as an array
            'skill' => 'nullable|array',
            'language' => 'nullable|string|max:255',
        ]);
        
        // 1. Update the existing $this->skills model instance with validated data.
        // This is all you need for saving!
        $this->skills->update($validatedData);

        // 2. Clear the flash message for the next action, and notify the user.
        session()->flash('message', 'Skills updated successfully.');
        
        // You might dispatch an event to close a modal here, if needed:
        $this->dispatch('hide-skill-modal');
    }

    public function render()
    {
        return view('livewire.user-profile.skill-component');
    }
}
