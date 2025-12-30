<?php

namespace App\Livewire\Researcher\Detail;

use App\Models\Research;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Headers extends Component
{
    public Research $research;

    public function mount(Research $research)
    {
        $this->research = $research; // Fetch data here
    }

    public function download($id)
    {
        $research = Research::findOrFail($id);

        $filePath = $research->file_path;

        if (!$filePath) {
            session()->flash('error', 'File path is missing!');
            return redirect()->back();
        }

        if (Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->download(
                $filePath,
                $research->title . '.pdf'
            );
        }

        session()->flash('error', 'File not found!');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.researcher.detail.headers');
    }
}
