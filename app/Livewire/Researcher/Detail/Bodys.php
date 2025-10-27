<?php

namespace App\Livewire\Researcher\Detail;

use App\Models\Research;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Bodys extends Component
{
    public $research;
    public $pdfUrl = null;

    public function mount($id)
    {
        $this->research = Research::findOrFail($id);

        // Only set URL if it exists and is a PDF
        if ($this->research->file_path && pathinfo($this->research->file_path, PATHINFO_EXTENSION) === 'pdf') {
            $this->pdfUrl = str_replace(
                'localhost',
                '127.0.0.1',
                Storage::disk('public')->url($this->research->file_path)
            );
        }
    }

    public function render()
    {
        return view('livewire.researcher.detail.bodys');
    }
}
