<?php

namespace App\Livewire\UserProfile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Short_introduction;

class ShortIntroductionComponent extends Component
{
    public $shortIntroductions;
    public $introduction;

    public function mount()
    {
        $this->shortIntroductions = Short_introduction::firstOrCreate(
            ['user_id' => Auth::id()],
            [
                'introduction' => null,
            ]
        );

        $this->introduction = $this->shortIntroductions->introduction;
    }

    public function resetFields()
    {
        $this->introduction = '';
    }

    public function save()
    {
        $validatedData = $this->validate([
            'introduction' => 'nullable|string|max:1000',
        ]);

        $this->shortIntroductions->update($validatedData);

        session()->flash('message', 'Short introduction updated successfully.');
    }

    public function render()
    {
        return view('livewire.user-profile.short-introduction-component');
    }
}
