<?php

namespace App\Livewire\UserProfile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Degree;

class DegreeComponent extends Component
{
    public $degree; 
    public $degrees;

    public function mount()
    {
        $this->degrees = Degree::firstOrCreate(
            ['user_id' => Auth::id()],
            [
                'degree' => null,
            ]
        );
        $this->degree = $this->degrees->degree ?? null;

        $this->resetFields();
    }

    public function resetFields()
    {
        $this->degree = '';
    }

    public function updated()
    {
        $this->validateOnly([
            'degree' => 'nullable|string|max:255',
        ]);

        $this->degrees->update([
            'degree' => $this->degree,
        ]);

        session()->flash('message', 'Degree updated successfully.');
    }

    public function render()
    {
        return view('livewire.user-profile.degree-component');
    }
}
