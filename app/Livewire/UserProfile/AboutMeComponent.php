<?php

namespace App\Livewire\UserProfile;

use Livewire\Component;
use App\Models\AboutMe;
use Illuminate\Support\Facades\Auth;

class AboutMeComponent extends Component
{
    public $aboutMe;
    public $introduction;
    public array $disciplines = [];
    public string $newDiscipline = '';
    public array $searchResults = [];
    public $twitter_profile;
    public $website;
    public string $newAuthorName = '';

    public array $availableDisciplines = [
        'Computer Engineering' => 'Computer Engineering',
        'Computer Science' => 'Computer Science',
        'Data Science' => 'Data Science',
        'Information Technology' => 'Information Technology',
        'Software Engineering' => 'Software Engineering',
        'Web Development' => 'Web Development',
        'Artificial Intelligence' => 'Artificial Intelligence',
        'Machine Learning' => 'Machine Learning',
        'Cybersecurity' => 'Cybersecurity',
        'Cloud Computing' => 'Cloud Computing',
        'Network Administration' => 'Network Administration',
        'Database Management' => 'Database Management',
        'DevOps' => 'DevOps',
        'Mobile App Development' => 'Mobile App Development',
        'UI/UX Design' => 'UI/UX Design',
        'Game Development' => 'Game Development',
        'IT Project Management' => 'IT Project Management',
        'IT Consulting' => 'IT Consulting',
        'Animals Science' => 'Animals Science',
        'Enviroments Science' => 'Enviroments Science',
        'Food Science' => 'Food Science',
        'Forestry' => 'Forestry',
        'Soile Science' => 'Soile Science',
        'Water Science' => 'Water Science',
        'Cancer Research' => 'Engineering',
        'Canopy Research' => 'Canopy Research',
        'Cell Biology' => 'Cell Biology',
        'Developmental Biology' => 'Developmental Biology',
        'Ecology' => 'Ecology',
        'Human Biology' => 'Human Biology',
        'Chemical Biology' => 'Chemical Biology',
        'Electrochemistry' => 'Electrochemistry',
        'Flow Chemistry' => 'Flow Chemistry',
        'Green Chemistry' => 'Green Chemistry',
    ];

    public function mount()
    {
        $this->aboutMe = AboutMe::firstOrCreate(
            ['user_id' => Auth::id()],
            [
                'introduction' => null,
                'disciplines' => '',
                'twitter_profile' => null,
                'website' => null,
            ]
        );

        $this->introduction = $this->aboutMe->introduction;
        // $this->disciplines = $this->aboutMe->disciplines;
        $this->twitter_profile = $this->aboutMe->twitter_profile;
        $this->website = $this->aboutMe->website;
        $dbDisciplines = $this->aboutMe->disciplines;
        $this->disciplines = is_string($dbDisciplines) 
            ? array_filter(array_map('trim', explode(',', $dbDisciplines))) 
            : ($dbDisciplines ?? []); 
    }

    public function resetFields()
    {
        $this->introduction = $this->aboutMe->introduction;
        // $this->disciplines = $this->aboutMe->disciplines;
        // $this->newDiscipline = '';
        $this->twitter_profile = $this->aboutMe->twitter_profile;
        $this->website = $this->aboutMe->website;
    }

    public function updatedNewDiscipline($value)
    {
        $this->searchResults = []; 

        if (strlen($this->newDiscipline) >= 1) { 
            $search = strtolower($this->newDiscipline); 
            
            // 1. Get the list of discipline names the user has already selected
            // We use array_map to normalize the keys if necessary, but array_values is safer here.
            $selectedDisciplineNames = array_values($this->disciplines); 

            // 2. Filter availableDisciplines
            $filteredDisciplines = array_filter(
                $this->availableDisciplines,
                function ($disciplineName) use ($search, $selectedDisciplineNames) {
                    // Check if the name contains the search string (Case-Insensitive)
                    $matchesSearch = str_contains(strtolower($disciplineName), $search);
                    
                    // Check if the name is NOT already in the user's selected list
                    $isNotSelected = !in_array($disciplineName, $selectedDisciplineNames);
                    
                    // Only return disciplines that match the search AND are not already selected
                    return $matchesSearch && $isNotSelected;
                }
            );

            // 3. Update the results property (array of names/values)
            $this->searchResults = array_values($filteredDisciplines);
        }
    }

    // app\Livewire\UserProfile\AboutMeComponent.php
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
    public function removeAuthor($discipline)
    {
        // Resetting the keys after filtering is good practice for clean array indexing
        $this->disciplines = array_values(array_filter($this->disciplines, fn($a) => $a !== $discipline));
    }

    
    public function save()
    {
        $validatedData = $this->validate([
            'introduction' => 'nullable|string|max:500',
            'disciplines' => 'nullable|array',
            'twitter_profile' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
        ]);

        // In your Livewire component's save method...
        $this->aboutMe->update([
            // Convert the PHP array back to a comma-separated string for storage
            'disciplines' => implode(', ', $this->disciplines), 
            // ...
        ]);
        $this->aboutMe->update($validatedData);

        session()->flash('message', 'About me information saved successfully!');
        $this->dispatch('hide-modal');
        $this->resetFields();
    }
    
    public function render()
    {
        return view('livewire.user-profile.about-me-component');
    }
}
