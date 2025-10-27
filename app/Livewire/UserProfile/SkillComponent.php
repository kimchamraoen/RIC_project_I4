<?php

namespace App\Livewire\UserProfile;

use App\Models\Skill;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SkillComponent extends Component
{
    /** @var array The property bound to the multi-select form field */
    public array $skill = []; 
    public $language;

    /** @var Skill The Eloquent model instance */
    public $skills;

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
        
        // Load the array from the database into the public property.
        // Use (array) cast defensively.
        $this->skill = (array) $this->skills->skill;
        $this->language = $this->skills->language;
    }

    /**
     * Resets public properties to the current saved state of the model.
     */
    public function resetFields()
    {
        // Must cast to array because Eloquent cast is handled by the model
        $this->skill = (array) $this->skills->skill;
        $this->language = $this->skills->language;
    }

    public function update(){
        $validatedData = $this->validate([
            // Ensure Livewire validates the $skill property as an array
            'skill' => 'nullable|array',
            'language' => 'nullable|string|max:255',
        ]);
        
        // 1. Update the existing $this->skills model instance with validated data.
        $this->skills->update($validatedData);

        // 2. CRITICAL SYNCHRONIZATION STEP: 
        // Refresh the model instance from the database to ensure we get the latest, correctly casted data.
        $this->skills->refresh(); 
        
        // 3. Reset the component properties using the refreshed model data.
        $this->resetFields();

        // 4. Notify the user.
        session()->flash('message', 'Skills updated successfully.');
        $this->dispatch('hide-skill-modal');
    }

    public function render()
    {
        return view('livewire.user-profile.skill-component');
    }
}
