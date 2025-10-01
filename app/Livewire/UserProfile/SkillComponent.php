<?php

namespace App\Livewire\UserProfile;

use App\Models\Skill;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SkillComponent extends Component
{
    public $skill = [];
    public $language,$skills;

    public function mount(){
        $this->skills = Skill::firstOrCreate(
            ['user_id' => Auth::id()],
            [
                'skill' => [],
                'language' => null,
            ]
        );
        $this->skill = $this->skills->skill ?? [];
        $this->language = $this->skills->language ?? null;
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->skill = $this->skills->skill ?? [];
        $this->language = $this->skills->language ?? null;
    }

    public function openEditModal()
    {
        $this->dispatch('show-skill-modal');
    }

    public function update(){
        $validatedData = $this->validate([
            'skill' => 'nullable|array',
            'language' => 'nullable|string|max:255',
        ]);

        $this->skills->update($validatedData);

        $skills = Skill::firstOrCreate(['user_id' => Auth::id()]);

        $skills->skill = $this->skill;
        $skills->language = $this->language;
        $skills->save();

        session()->flash('message', 'Skills updated successfully.');
    }

    public function render()
    {
        return view('livewire.user-profile.skill-component');
    }
}
