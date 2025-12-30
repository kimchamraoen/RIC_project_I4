<?php

namespace App\Livewire\UserProfile;

use App\Models\Skill;
use Doctrine\Inflector\Language;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SkillComponent extends Component
{
    public Skill $skillModel;      // Eloquent model
    public Language $languageModel;  // Eloquent model
    public array $skill = [];      // Array of selected skills for UI
    public array $language = [];   // Array of selected languages for UI
    // public string $language = '';   // Single language

    public bool $showDropdownSkill = false;
    public bool $showDropdown = false;

    // Replace with DB later if needed
    public array $allSkills = [
        'Web Development',
        'Mobile Development',
        'Database Management',
        'Project Management',
        'Graphic Design',
        'UI/UX Design',
        'Cybersecurity',
        'Networking',
        'Cloud Computing',
        'Machine Learning',
        'Data Analysis',
        'DevOps',
    ];
    public array $allLanguages = [
        'Khmer',
        'English',
        'Spanish',
        'French',
        'German',
        'Chinese',
        'Japanese',
        'Russian',
        'Arabic',
        'Portuguese',
        'Hindi',
        'Bengali',
        'Korean',
        'Italian',
    ];

    /** Toggle dropdown visibility */
    public function toggleDropdown()
    {
        $this->showDropdown = !$this->showDropdown;
    }

    public function toggleDropdownSkill()
    {
        $this->showDropdownSkill = !$this->showDropdownSkill;
    }
    
    /** Add a skill to the array */
    public function selectSkill($name)
    {
        if (!in_array($name, $this->skill)) {
            $this->skill[] = $name;
        }
    }

    public function selectLanguage($name)
    {
        if (!in_array($name, $this->language)) {
            $this->language[] = $name;
        }
    }

    /** Remove a skill from the array */
    public function removeSkill($name)
    {
        $this->skill = array_filter($this->skill, fn($s) => $s !== $name);
    }
     
    public function removeLanguage($name)
    {
        $this->language = array_filter($this->language, fn($l) => $l !== $name);
    }

    /** Mount the component with existing data */
    public function mount()
    {
        $this->skillModel = Skill::firstOrCreate(
            ['user_id' => Auth::id()],
            [
                'skill' => [],
                'language' => [],
            ]
        );

        // Load values from model into public properties for UI
        $this->skill = $this->skillModel->skill ?? [];
        $this->language = $this->skillModel->language ?? [];
    }

    /** Reset component fields to current model state */
    public function resetFields()
    {
        $this->skill = $this->skillModel->skills ?? [];
        $this->language = $this->skillModel->language ?? [];
    }

    /** Update the model with validated data */
    public function update()
    {
        $validatedData = $this->validate([
            'skill' => 'nullable|array',
            'language' => 'nullable|array',
        ]);

        // Save changes to the model
        $this->skillModel->update($validatedData);

        // Refresh model to get casted values
        $this->skillModel->refresh();

        // Update component UI properties
        // $this->resetFields();

        session()->flash('message', 'Skills updated successfully.');
        $this->dispatch('hide-skill-modal');
    }

    public function render()
    {
        return view('livewire.user-profile.skill-component');
    }
}
