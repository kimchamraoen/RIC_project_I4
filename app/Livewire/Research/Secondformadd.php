<?php

namespace App\Livewire\Research;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Research;
use Illuminate\Support\Facades\Auth;
class Secondformadd extends Component
{
    use WithFileUploads;

    public $description;
    public $file;
    public $researchId;

    public function mount($researchId)
    {
        $this->researchId = $researchId;
        $research = Research::findOrFail($researchId);

        $this->description = $research->description ?? '';
    }

     public function submit()
    {
        $this->validate([
            'description' => 'required|string|max:1000',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        $research = Research::findOrFail($this->researchId);
        $research->description = $this->description;

        if ($this->file) {
            $research->file_path = $this->file->store('research_files', 'public');
        }

        $research->save();

        session()->flash('success', 'Research details uploaded successfully!');
        return redirect()->route('iterms'); // adjust as needed
    }

    public function render()
    {
        return view('livewire.research.secondformadd');
    }
}
