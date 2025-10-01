<?php

namespace App\Livewire\UserProfile;

use Livewire\Component;
use App\Models\AboutMe;
use Illuminate\Support\Facades\Auth;

class AboutMeComponent extends Component
{
    public $aboutMe;
    public $introduction;
    public $disciplines = [];
    // public $newDiscipline;
    public $twitter_profile;
    public $website;

    public function mount()
    {
        $this->aboutMe = AboutMe::firstOrCreate(
            ['user_id' => Auth::id()],
            [
                'introduction' => null,
                'disciplines' => [],
                'twitter_profile' => null,
                'website' => null,
            ]
        );

        $this->introduction = $this->aboutMe->introduction;
        $this->disciplines = $this->aboutMe->disciplines;
        $this->twitter_profile = $this->aboutMe->twitter_profile;
        $this->website = $this->aboutMe->website;
    }

    public function resetFields()
    {
        $this->introduction = $this->aboutMe->introduction;
        $this->disciplines = $this->aboutMe->disciplines;
        // $this->newDiscipline = '';
        $this->twitter_profile = $this->aboutMe->twitter_profile;
        $this->website = $this->aboutMe->website;
    }

    // public function addDiscipline()
    // {
    //     if ($this->newDiscipline) {
    //         $this->disciplines[] = $this->newDiscipline;
    //         $this->newDiscipline = '';
    //     }
    // }

    // public function removeDiscipline($index)
    // {
    //     unset($this->disciplines[$index]);
    //     $this->disciplines = array_values($this->disciplines);
    // }

    public function save()
    {
        $validatedData = $this->validate([
            'introduction' => 'nullable|string|max:500',
            'disciplines' => 'nullable|array',
            'twitter_profile' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
        ]);

        $this->aboutMe->update($validatedData);

        session()->flash('message', 'About me information saved successfully!');
        $this->dispatch('hide-modal');
        $this->resetFields();
    }
    
    public function render()
    {
        return view('livewire.user-profile.about-me-component');
    }
}
