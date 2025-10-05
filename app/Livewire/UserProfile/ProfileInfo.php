<?php

namespace App\Livewire\UserProfile;

use Livewire\Component;
use function view;
use App\Models\ProfileInformation;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProfileInfo extends Component
{
    use WithFileUploads;

    public $profileInformation;
    public $editingSection;
    public $editingId;

    // Form properties
    public $name;
    public $institution;
    public $location;
    public $degree;
    public $image; // Holds the current persisted image path
    public $newImage; // Holds the temporary uploaded image

    // Optional: Add a listener to force refresh if needed by other components (unlikely to fix full refresh)
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $user = Auth::user();

        // 1. Find or create the profile record.
        // firstOrCreate ensures the profile is only seeded with Auth::user() data once.
        // On subsequent loads, it retrieves the existing record with all saved edits.
        $this->profileInformation = ProfileInformation::firstOrCreate(
            ['user_id' => $user->id],
            [
                // These defaults are only used if the profile is brand new.
                'name' => $user->name ?? '',
                'institution' => $user->institution ?? '',
                'location' => $user->faculty ?? '',
                'degree' => $user->department ?? '',
                'image' => 'default_profile.png', // Ensure a default path is saved immediately
            ]
        );

        // 2. Assign properties from the database model (which now holds the latest saved data)
        $this->name = $this->profileInformation->name;
        $this->institution = $this->profileInformation->institution;
        $this->location = $this->profileInformation->location;
        $this->degree = $this->profileInformation->degree;
        // CRITICAL: Initialize $this->image from the DB, using a default if necessary
        $this->image = $this->profileInformation->image ?: 'default_profile.png';

        // Debugging log to check user details
        logger()->info('Authenticated User Profile Loaded:', [
            'user_id' => $user->id,
            'db_name' => $this->name,
            'db_image' => $this->image,
        ]);
    }

    public function openEditModal($section, $id = null)
    {
        $this->editingSection = $section;
        $this->editingId = $id;

        // Pre-populate the form fields with current persisted data
        if ($section === 'profileInformation') {
            $this->name = $this->profileInformation->name;
            $this->institution = $this->profileInformation->institution;
            $this->location = $this->profileInformation->location;
            $this->degree = $this->profileInformation->degree;
            $this->image = $this->profileInformation->image ?: 'default_profile.png';
            $this->newImage = null; // Clear any previous temporary file
        }

        $this->dispatch('show-modal');
    }

    public function update()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'institution' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'newImage' => 'nullable|image|max:1024',
        ];

        $this->validate($rules);

        $currentImagePath = $this->profileInformation->image;
        $newImagePath = $currentImagePath; // Start with the existing path

        if ($this->newImage) {
            // Handle deletion of old image if it exists and is not the default
            if ($currentImagePath && $currentImagePath !== 'default_profile.png' && Storage::disk('public')->exists($currentImagePath)) {
                Storage::disk('public')->delete($currentImagePath);
            }
            // Store the new image and get its path
            $newImagePath = $this->newImage->store('images', 'public');
        }

        // Update the model in the database
        $this->profileInformation->update([
            'name' => $this->name,
            'institution' => $this->institution,
            'location' => $this->location,
            'degree' => $this->degree,
            // Use the determined path (new path or existing path)
            'image' => $newImagePath ?: 'default_profile.png', 
        ]);
        
        // *** CRITICAL FOR PERSISTENCE & SYNCHRONIZATION ***
        // 1. Refresh the model instance from the database to get the latest saved state
        $this->profileInformation->refresh();

        // 2. Re-populate the component's public properties from the refreshed model
        $this->name = $this->profileInformation->name;
        $this->institution = $this->profileInformation->institution;
        $this->location = $this->profileInformation->location;
        $this->degree = $this->profileInformation->degree;
        $this->image = $this->profileInformation->image; // Use the persisted image path
        
        // 3. Clear the temporary file upload property
        $this->newImage = null;

        $this->dispatch('profile-updated'); // Dispatch the event
        $this->dispatch('hide-modal');
        $this->dispatch('show-toast', ['message' => 'Profile updated successfully!', 'type' => 'success']);
    }

    public function render()
    {
        // Ensure that the image URL passed to the view is correctly generated
        // (Assuming you use something like asset() or Storage::url() in your Blade view)
        return view('livewire.user-profile.profile-info');
    }
}
