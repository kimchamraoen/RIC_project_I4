<?php

namespace App\Livewire\Researcher\Detail;

use App\Models\Research;
use Livewire\Component;

class Bodys extends Component
{
    public $research;

    public function mount($id, Research $researchHeader)
    {
        $this->research = Research::findOrFail($id); // Fetch data here

        // $this->research = $researchHeader->research ?? new Research();
    }

    public function render()
    {
        return view('livewire.researcher.detail.bodys');
    }
}
