<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Question as QuestionModel;

class Question extends Component
{
    public $questions;

    public function mount()
    {
        $this->questions = QuestionModel::orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.question');
    }
}
