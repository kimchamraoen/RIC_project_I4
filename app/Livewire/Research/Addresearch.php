<?php

namespace App\Livewire\Research;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Research;
use App\Models\User; // NEW: Import the User model
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB; // REMOVED: No longer needed as we use the Model

class Addresearch extends Component
{
    use WithFileUploads;

    // Existing Properties
    public $publication_type='';
    public $title;
    public array $authors = [];
    public $day;
    public $month;
    public $year;
    public $file, $file_path;
    public $published_at;
    public $description;
    public $addReseach;
    public $research = [];

    public $header_title = 'Your Research';

    // NEW PROPERTIES FOR SEARCH/INPUT
    public string $newAuthorName = '';
    public array $searchResults = []; // Now holds collections of User Models

    // public $step = 1;
    public function reseted()
    {
        $this->title = '';
        $this->publication_type = '';
        $this->authors = [];
        $this->day = '';
        $this->month = '';
        $this->year = '';
        $this->file_path = '';
        
        // Also reset search specific properties
        $this->newAuthorName = '';
        $this->searchResults = [];
    }

    // Add a listener property to catch the event from the sidebar
     protected $listeners = ['categorySelected' => 'selectCategory'];

    public function mount()
    {
        // Fix for firstOrCreate: Ensure 'authors' is initialized correctly from DB
        // $this->addReseach = Research::firstOrCreate(
        //     ['user_id' => Auth::id()],
        //     [
        //         'title' => '', 
        //         'publication_type' => '',
        //         // Note: The DB should allow authors to be NULL or store an empty JSON array '[]'
        //         'authors' => '', 
        //         'day' => '',
        //         'month' => '',
        //         'year' => '',
        //         'file_path'=> null,
        //         'description' => null, // Added description for completeness
        //     ]
        // );
        // 1. Capture the 'type' (the form value) from the URL
        $type = request()->query('type');
        
        // 2. Capture the 'text' (the menu label) from the URL
        $text = request()->query('text');

        if ($type && $text) {
            // This line sets the value that Livewire uses to pre-select the <select>
            $this->publication_type = $type;
            
            // This sets the header (e.g., "Add Your Conference paper")
            $this->header_title = 'Add Your ' . $text;
            // dd($this->publication_type);
        }

        
        $this->addReseach = new Research();
        $this->title = $this->addReseach->title ?? '';
        $this->publication_type = $this->addReseach->publication_type ?? '';
        
        // Safely decode authors from JSON string if needed, ensuring it results in an array
        $dbAuthors = $this->addReseach->authors;
        $this->authors = is_array($dbAuthors) 
            ? $dbAuthors 
            : (is_string($dbAuthors) ? json_decode($dbAuthors, true) : null) ?? [];
        
        $this->day = $this->addReseach->day ?? '';
        $this->month = $this->addReseach->month ?? '';
        $this->year = $this->addReseach->year ?? '';
        $this->file_path = $this->addReseach->file_path ?? null;

        // Removing reseted() from mount() as it seems to clear initial data immediately after loading it
        // If you intended to clear the input fields after loading old data, move this back.
        $this->reseted(); 
    }
    
    // NEW METHOD: Handles the real-time search logic
    public function updatedNewAuthorName($value)
    {
        // Use the property for the collection directly, matching the user's intent.
        $result = collect(); 
        $userCurrentId = Auth::id();
        
        $this->searchResults = []; // Ensure old results are cleared

        if (strlen($this->newAuthorName) >= 1) { // Changed $this->search to $this->newAuthorName
            $search = strtolower($this->newAuthorName); // Use newAuthorName
            
            // Integrate user's provided Eloquent logic, adjusted for profileInformation relation
            $result = User::query()
                ->with('profileInformation') 
                ->where('id', '!=', $userCurrentId) 
                ->where(function ($q) use ($search) {
                    $q->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                    ->orWhereHas('profileInformation', function ($q) use ($search) {
                         // Search within the profileInformation relation
                         $q->whereRaw('LOWER(research_unit) LIKE ?', ["%{$search}%"]);
                    });
                })
                ->limit(5)
                ->get();
        }
        
        // Update the results property
        $this->searchResults = $result->toArray(); 
    }

    // NEW METHOD: Selects an author from the dropdown
    public function selectAuthor(string $authorName)
    {
        // The $authorName passed here is the user's name (e.g., "John Doe")
        // Use the existing addAuthor logic
        if (!empty($authorName) && !in_array($authorName, $this->authors)) {
            $this->authors[] = $authorName;
        }

        // Clear input and hide results
        $this->newAuthorName = '';
        $this->searchResults = [];
    }
    
    // UPDATED METHOD: Now uses the bound property $this->newAuthorName
    public function addAuthor()
    {
        // The $author is the text currently in the input field
        $author = trim($this->newAuthorName);

        if (!empty($author) && !in_array($author, $this->authors)) {
            $this->authors[] = $author;
        }
        
        // Clear the input field after adding (via Enter key)
        $this->newAuthorName = '';
        $this->searchResults = [];
    }

    // Existing methods (removeAuthor and submit)
    public function removeAuthor($author)
    {
        // Resetting the keys after filtering is good practice for clean array indexing
        $this->authors = array_values(array_filter($this->authors, fn($a) => $a !== $author));
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'publication_type' => 'required|string|max:500',
            'title' => 'required|string|max:255',
            // Rule change: authors must be an array, but can be empty now if user prefers
            'authors' => 'nullable|array', 
            'day' => 'required|string|min:1|max:31',
            'month' => 'required|string|min:1|max:12',
            'year' => 'required|string|max:2030',
            'file' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        // Convert the array of authors to a JSON string for database storage
        $validatedData['authors'] = json_encode($this->authors);

        if ($this->file) { $validatedData['file_path'] = $this->file->store('research_files', 'public');}
        
        $validatedData['user_id'] = Auth::id();

        
        $research = Research::create($validatedData);
        
        return redirect()->route('research.secondform', ['researchId' => $research->id]);

        session()->flash('message', 'About me information saved successfully!');
        $this->dispatch('hide-modal');
    }

 public function selectCategory(string $type, string $displayText)
    {
        // Update the form's select input value
        $this->publication_type = $type;
        
        // UPDATE THE HEADER TITLE
        $this->header_title = 'Add Your ' . $displayText;
        
        // Tell Livewire to refresh the view to ensure dynamic styling and the header updates
        $this->dispatch('$refresh'); 
    }



    public function render()
    {
        return view('livewire.research.addresearch');
        
    }
}
