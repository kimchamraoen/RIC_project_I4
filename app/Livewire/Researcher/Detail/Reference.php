<?php

namespace App\Livewire\Researcher\Detail;

use App\Models\Research;
use Livewire\Component;

class Reference extends Component
{
    // public $researchItem;

    // public function mount($id)
    // {
    //     // Fetch the data based on the ID
    //     $this->researchItem = Research::findOrFail($id);
    // }

    public function render()
    {
        return view('livewire.researcher.detail.reference');
    }
}
