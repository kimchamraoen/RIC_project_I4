<?php

namespace App\Livewire\Register;

use Livewire\Component;

class ConductResearch extends Component
{
    public $institution;
    public $faculty;
    public $department;
    public $researchUnit;
    public $researchDate;

    public function conduct()
    {
        // Example validation
        $this->validate([
            'institution' => 'required|string|max:255',
            'faculty' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'researchUnit' => 'required|string|max:255',
            'researchDate' => 'required|date',
        ]);

        // Do something with the data, e.g. save to DB
    }
    public function render()
    {
        return view('livewire.register.conduct-research');
    }
}
