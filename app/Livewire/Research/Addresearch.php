<?php

namespace App\Livewire\Research;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Research;

class Addresearch extends Component
{
    use WithFileUploads;

    public $publication_type;
    public $title;
    public $authors = [];
    public $day;
    public $month;
    public $year;
    public $file;

    protected $rules = [
        'publication_type' => 'required|string',
        'title' => 'required|string|max:255',
        'authors' => 'required|array|min:1',
        'day' => 'required|integer|min:1|max:31',
        'month' => 'required|integer|min:1|max:12',
        'year' => 'required|integer|min:1900',
       'file' => 'nullable|mimes:pdf|max:5120', // max 5MB
    ];

    public function submit()
    {
        $this->validate();

        $date = sprintf('%04d-%02d-%02d', $this->year, $this->month, $this->day);

        $path = $this->file ? $this->file->store('research_files', 'public') : null;

        Research::create([
            'publication_type' => $this->publication_type,
            'title' => $this->title,
            'authors' => $this->authors,
            'published_at' => $date,
            'file_path' => $path,
        ]);

        session()->flash('success', 'Research submitted successfully!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.research.addresearch');
    }
}
