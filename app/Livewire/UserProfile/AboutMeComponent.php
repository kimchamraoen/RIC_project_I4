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
    public function selectDiscipline(string $disciplineName)
    {
        // 1. Ensure the discipline isn't already added (case-insensitive check)
        $normalizedDisciplines = array_map('strtolower', array_values($this->disciplines));
        $normalizedNewDiscipline = strtolower($disciplineName);

        if (!in_array($normalizedNewDiscipline, $normalizedDisciplines)) {
            // Add the new discipline (using its original casing)
            $this->disciplines[] = $disciplineName;
        }

        // 2. Clear the input field to hide the dropdown
        $this->newDiscipline = ''; 

        // 3. Clear the search results
        $this->searchResults = [];
    }
    
    // UPDATED METHOD: Now uses the bound property $this->newAuthorName
    public function addDiscipline()
    {
        // The $author is the text currently in the input field
        $discipline = trim($this->newDiscipline);

        if (!empty($discipline) && !in_array($discipline, $this->disciplines)) {
            $this->disciplines[] = $discipline;
        }
        
        // Clear the input field after adding (via Enter key)
        $this->newDiscipline = '';
        $this->searchResults = [];
    }

    // Your Livewire Component PHP Class

    // ... other methods and properties

    // app\Livewire\UserProfile\AboutMeComponent.php

    public function removeDiscipline(string $disciplineName)
    {
        // Ensure the property is an array before filtering.
        if (!is_array($this->disciplines)) {
            $this->disciplines = [];
            return;
        }

        // Use array_filter to keep only the elements that DO NOT match the $disciplineName.
        // $discipline here is the string value (e.g., 'Mathematics').
        $this->disciplines = array_filter($this->disciplines, function (string $discipline) use ($disciplineName) {
            
            // Return TRUE to KEEP the item; FALSE to remove it.
            // The comparison uses strict inequality to ensure exact match and type.
            return $discipline !== $disciplineName;
            
        });
        
        // Optional: Re-index the array keys (0, 1, 2, ...) after filtering.
        // This is generally good practice when removing items from an array you iterate over.
        $this->disciplines = array_values($this->disciplines);
        
        // Optionally trigger a success message or re-render
        $this->dispatch('disciplineRemoved'); 
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
