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
    public $file; // Holds the UploadedFile object (new file)
    public $file_path2; // Holds the file path string (existing file)
    public $researchId; 

    // Ensure the user is authenticated (security check recommended here)
    public function mount($researchId) 
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Load the specific record ensuring it belongs to the user
        $research = Research::where('id', $researchId)
                            ->where('user_id', Auth::id())
                            ->firstOrFail();
        
        $this->researchId = $research->id;

        $this->description = $research->description ?? null;
        
        // 🚨 FIX 1: Correctly read from the local $research variable, not $this->research
        $this->file_path2 = $research->file_path2 ?? null;
    }

    public function submit()
    {
        $this->validate([
            'description' => 'required|string|max:5000',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        $research = Research::where('id', $this->researchId)
                            ->where('user_id', Auth::id())
                            ->firstOrFail();
        
        $research->description = $this->description;

        // 🚨 FIX 2: Assign the stored path directly to the model instance
        if ($this->file) { 
            // Store the file and assign the resulting path string to the model property
            $research->file_path2 = $this->file->store('research_files', 'public');
        }
        
        // If $this->file was null, the existing $research->file_path2 remains unchanged.
        // If $this->file was set, it now holds the new path.

        $research->save();

        session()->flash('success', 'Research details uploaded successfully!');
        return redirect()->route('items');
    }

    public function render()
    {
        return view('livewire.research.secondformadd');
    }
}
