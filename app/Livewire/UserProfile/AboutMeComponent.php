<?php

namespace App\Livewire\UserProfile;

use Livewire\Component;
use App\Models\AboutMe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AboutMeComponent extends Component
{
    public $aboutMe;
    public $introduction;
    public array $disciplines = [];
    public string $newAuthorName = ''; // Used for both typing/search and adding
    public array $searchResults = [];
    public $twitter_profile;
    public $website;
    public $newDiscipline = '';

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
        'Cancer Research' => 'Cancer Research', // Corrected a typo here
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
                'disciplines' => null,
                'twitter_profile' => null,
                'website' => null,
            ]
        );

        $this->introduction = $this->aboutMe->introduction;
        $this->twitter_profile = $this->aboutMe->twitter_profile;
        $this->website = $this->aboutMe->website;
        
        // Ensure disciplines are loaded as a clean array on mount
        $dbDisciplines = $this->aboutMe->disciplines;
        $this->disciplines = is_string($dbDisciplines)  
            ? array_filter(array_map('trim', explode(',', $dbDisciplines))) 
            : ($dbDisciplines ?? []); 
    }

    public function resetFields()
    {
        $this->introduction = $this->aboutMe->introduction;
        $this->twitter_profile = $this->aboutMe->twitter_profile;
        $this->website = $this->aboutMe->website;
        
        // Re-load disciplines from the model if they were saved successfully
        $dbDisciplines = $this->aboutMe->fresh()->disciplines;
        $this->disciplines = is_string($dbDisciplines)  
            ? array_filter(array_map('trim', explode(',', $dbDisciplines))) 
            : ($dbDisciplines ?? []);
    }

    public function updatedNewAuthorName($value)
    {
        $this->searchResults = [];

        if (strlen($this->newAuthorName) >= 1) {
            $search = strtolower($this->newAuthorName);

            $filtered = collect($this->availableDisciplines)
                ->filter(fn($d) => Str::contains(strtolower($d), $search))
                ->take(5)
                ->values();

            $this->searchResults = $filtered->map(fn($d) => ['name' => $d])->all();
        }
    }


    // ✅ Add a new custom discipline when pressing Enter
    public function addAuthor()
    {
        $name = trim($this->newAuthorName);
        if ($name && !in_array($name, $this->disciplines)) {
            $this->disciplines[] = $name;
        }

        // Clear input + results
        $this->newAuthorName = '';
        $this->searchResults = [];
    }


    // 🖱 Add discipline from dropdown
    public function selectDiscipline($value)
    {
        if ($value && !in_array($value, $this->disciplines)) {
            $this->disciplines[] = $value;
        }

        // Clear input + results
        $this->newAuthorName = '';
        $this->searchResults = [];
    }


    // ❌ Remove discipline tag
    public function removeDiscipline($value)
    {
        $this->disciplines = array_values(
            array_filter($this->disciplines, fn($d) => $d !== $value)
        );
    }

    public function save()
    {
        $validatedData = $this->validate([
            'introduction' => 'nullable|string|max:500',
            'disciplines' => 'nullable|array',
            'twitter_profile' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255|url', // Added URL validation
        ]);

        // Convert the PHP array back to a comma-separated string for storage
        $validatedData['disciplines'] = implode(', ', $this->disciplines); 
        
        $this->aboutMe->update($validatedData);

        session()->flash('message', 'About me information saved successfully!');
        $this->dispatch('hide-about-me-modal'); // Dispatch the event to close the modal
        $this->resetFields();
    }
    
    public function render()
    {
        return view('livewire.user-profile.about-me-component');
    }
}
