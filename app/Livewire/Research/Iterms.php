<?php

namespace App\Livewire\Research;

use App\Models\Research;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Iterms extends Component
{
    public $research = [];
    public $filterType = '';
    public $researchItem;

    public $header_title = 'Feartured Research';

    public function mount()
    {
        $this->filterType = request()->query('type', '');

        $query = Research::where('user_id', Auth::id());

        if (!empty($this->filterType)) {
            $query->where('publication_type', $this->filterType);
            $this->header_title = $this->filterType;
        } else {
            $this->header_title = 'All Feartured Research';
        }

        $this->research = $query->latest()->get();
    }

    public function edit($id)
    {
        $this->researchItem = Research::find($id);
        $this->emit('openEditModal', $this->researchItem);
    }

    public function update()
    {
        
    }

    public function delete($id)
    {
        $research = Research::find($id);
        if ($research) {
            // Delete the associated file from storage
            if ($research->file_path && Storage::disk('public')->exists($research->file_path)) {
                Storage::disk('public')->delete($research->file_path);
            }

            $research->delete();
            session()->flash('message', 'Research deleted successfully.');
            // Refresh the research list
            $this->mount();
        } else {
            session()->flash('error', 'Research not found.');
        }
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
        return view('livewire.research.iterms');
    }
}
