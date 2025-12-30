<?php

namespace App\Livewire;

use App\Models\Research;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Home extends Component
{
    public $user;
    public $research='';

    public function mount()
    {
        $this->user = Auth::user(); 
        $this->research = Research::orderBy('year', 'desc')->get();
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
        return view('livewire.home');
    }
}
