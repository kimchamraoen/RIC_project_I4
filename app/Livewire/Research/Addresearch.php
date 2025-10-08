<?php

namespace App\Livewire\Research;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Research;
use Illuminate\Support\Facades\Auth;

class Addresearch extends Component
{
    use WithFileUploads;

    public $publication_type;
    public $title;
    public $authors= [];
    public $day;
    public $month;
    public $year;
    public $file;
    public $published_at;
    public $description;
    public $addReseach;

    // public $step = 1;
    public function reseted()
    {
        $this->title = '';
        $this->publication_type = '';
        $this->authors = '';
        $this->day = '';
        $this->month = '';
        $this->year = '';
        $this->file_path = '';
    }


    public function mount()
    {
        $this->addReseach = Research::firstOrCreate(
            ['user_id' => Auth::id()],
            [
                'title' => '',  // <--- must include title!
                'publication_type' => '',
                'authors' => null,
                'day' => '',
                'month' => '',
                'year' => '',
                'file_path'=> null,
            ]
        );

        $this->title = $this->addReseach->title ?? '';
        $this->publication_type = $this->addReseach->publication_type ?? '';
        // $this->authors = $this->addReseach->authors ?? null;
        $this->authors = $this->addReseach->authors ? (is_array($this->addReseach->authors) 
        ? $this->addReseach->authors 
        : json_decode($this->addReseach->authors, true)) 
        : [];
        $this->day = $this->addReseach->day ?? '';
        $this->month = $this->addReseach->month ?? '';
        $this->year = $this->addReseach->year ?? '';
        $this->file_path = $this->addReseach->file_path ?? null;

        $this->reseted();
    }

    public function addAuthor($author)
    {
        if (!empty($author) && !in_array($author, $this->authors)) {
            $this->authors[] = $author;
        }
    }

    public function removeAuthor($author)
    {
        $this->authors = array_filter($this->authors, fn($a) => $a !== $author);
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'publication_type' => 'required|string|max:500',
            'title' => 'required|string|max:255',
            'authors' => 'nullable|array|min:1',
            'day' => 'required|string|min:1|max:31',
            'month' => 'required|string|min:1|max:12',
            'year' => 'required|string|max:2030',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        // $validatedData['authors'] = $this->authors;

        if ($this->file) { $validatedData['file_path'] = $this->file->store('research_files', 'public');}
       
        $validatedData['user_id'] = Auth::id();

        
        $research = Research::create($validatedData);
        //  $this->addReseach->create($validatedData);
        
       
        return redirect()->route('research.secondform', ['researchId' => $research->id]);

        session()->flash('message', 'About me information saved successfully!');
        $this->dispatch('hide-modal');
        // $this->reseted();
        // dd($validatedData);
    }

    public function render()
    {
        return view('livewire.research.addresearch');
        
    }
}
