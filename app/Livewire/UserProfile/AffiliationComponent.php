<?php

namespace App\Livewire\UserProfile;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ProfileInformation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AffiliationComponent extends Component
{
    // Important: Include the WithFileUploads trait to enable file handling
    use WithFileUploads;

    public $profileInformation;
    public $institution;
    public $location;
    public $degree;
    public $department;
    public $newImage; 
    
    // Stores the path of the existing image (loaded from DB column 'image')
    public $currentImagePath; 

    // Modal state
    public $showModal = false;

    public function mount()
    {
        // 1. Fetch or create the profile information record for the authenticated user
        $this->profileInformation = ProfileInformation::firstOrCreate(
            ['user_id' => Auth::id()],
            []
        );

        // 2. Load existing data into component properties
        $this->loadData();
    }

    /**
     * Loads the latest data from the model into the component's public properties.
     */
    private function loadData()
    {
        // Ensure the profile model is refreshed
        $this->profileInformation->refresh();
        
        // Removed: $this->name = $this->profileInformation->name;
        $this->institution = $this->profileInformation->institution;
        $this->location = $this->profileInformation->location;
        $this->degree = $this->profileInformation->degree;
        $this->department = $this->profileInformation->department;
        // Load the stored path from the 'newImage' database column
        $this->currentImagePath = $this->profileInformation->newImage; 
    }

    public function openModal()
    {
        $this->loadData();
        $this->reset('newImage'); // Clear the file input state
        $this->resetValidation();
        $this->showModal = true;
        $this->dispatch('show-affiliations-modal'); // Re-dispatch event to ensure Alpine state is synced
    }

    /**
     * Closes the edit modal.
     */
    public function closeModal()
    {
        $this->showModal = false;
        $this->resetValidation(); 
        $this->dispatch('hide-affiliations-modal');
    }

    /**
     * Handles the removal of the current profile image.
     */
    public function removeImage()
    {
        // 1. Delete the file from storage if a path exists
        if ($this->currentImagePath) {
            // Ensure we delete from the 'public' disk
            Storage::disk('public')->delete($this->currentImagePath);
        }
        
        // 2. Clear the database entry and component properties
        // Update the 'newImage' column to null
        $this->profileInformation->update(['newImage' => null]);
        $this->currentImagePath = null;
        $this->newImage = null; // Also clear any pending upload

        // Dispatch success message
        session()->flash('success', 'Profile image removed.');
        $this->dispatch('show-toast', ['message' => 'Profile image removed.', 'type' => 'info']);
    }

    /**
     * Validates the form data, handles the image upload, and saves all changes.
     */
    public function save()
    {
        // Use attribute validation based on #[Rule] properties.
        $this->validate(); 

        // Prepare data for the database update
        $data = [
            // Removed 'name' => $this->name,
            'institution' => $this->institution,
            'location' => $this->location,
            'degree' => $this->degree,
            'department' => $this->department,
        ];

        // 1. Handle New Image Upload
        if ($this->newImage) {
            // Delete old image if it exists
            if ($this->currentImagePath) {
                Storage::disk('public')->delete($this->currentImagePath);
            }
            
            // Store new image and get the path (e.g., 'profile-images/unique-hash.jpg')
            $path = $this->newImage->store('profile-images', 'public');
            // Save the path to the 'newImage' database column
            $data['newImage'] = $path;
            
        } elseif ($this->currentImagePath === null && $this->profileInformation->newImage) {
            // This ensures the image field is explicitly nullified if it was removed before save.
             $data['newImage'] = null;
        }

        // 2. Update Profile Information
        $this->profileInformation->update($data);
        
        // 3. Update component state and close modal
        $this->loadData();
        $this->closeModal();
        
        // Dispatch event for a toast notification (assuming you have a listener setup)
        session()->flash('success', 'Profile and affiliations updated successfully!');
        $this->dispatch('show-toast', ['message' => 'Profile and affiliations updated successfully!', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.user-profile.affiliation-component');
    }
}
