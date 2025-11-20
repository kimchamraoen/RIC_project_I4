<?php

namespace App\Livewire\Guestpage;

use Livewire\Component;

class Questions extends Component
{
    public $questions;

    public function mount($question)
    {
        $this->question = $question;
    }
    public function render()
    {
        return view('livewire.guestpage.questions');
    }
}
