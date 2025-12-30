<?php

namespace App\Livewire\Research;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Question as QuestionModel;
use Illuminate\Support\Facades\Auth;

class Question extends Component
{
    use WithFileUploads;

    public $question;
    public $file;
    public $questionId = null;   // store editing ID

    public function createQuestion()
    {
        $this->resetFields();
        $this->dispatch('show-editor-role-modal');
    }

    public function save()
    {
        $this->validate([
            'question' => 'required|string|max:1000',
            'file'     => 'nullable|file|max:2048',
        ]);

        // Update if editing
        if ($this->questionId) {
            $question = QuestionModel::findOrFail($this->questionId);
        } 
        // Create new
        else {
            $question = new QuestionModel();
            $question->user_id = Auth::id();
        }

        $question->question = $this->question;

        if ($this->file) {
            $path = $this->file->store('questions_files', 'public');
            $question->file_path = $path;
        }

        $question->save();

        $this->dispatch('hide-editor-role-modal');
        session()->flash('message', 'Question saved successfully.');
        $this->resetFields();
    }

    public function editQuestion($id)
    {
        $this->questionId = $id;
        $question = QuestionModel::findOrFail($id);

        $this->question = $question->question;
        $this->file = null;

        $this->dispatch('show-editor-role-modal');
    }

    public function deleteQuestion($id)
    {
        QuestionModel::findOrFail($id)->delete();

        session()->flash('message', 'Question deleted successfully.');
    }

    public function resetFields()
    {
        $this->questionId = null;
        $this->question = '';
        $this->file = null;
    }

    public function render()
    {
        return view('livewire.research.question', [
            'questions' => QuestionModel::where('user_id', Auth::id())->latest()->get()
        ]);
    }
}
