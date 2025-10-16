<?php

namespace App\Livewire\UserProfile;

use App\Models\Affiliation;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AffiliationComponent extends Component
{
    use WithFileUploads;

    // Public properties
    // Note: Affiliation must be explicitly typed for model binding
    public Affiliation $affiliation, $affiliations; 
    public $uploadedImageFile; // Temporary property for the file upload input
    public $institution, $location, $degree, $department, $newImage;

    /**
     * Initializes the component, guaranteeing $this->affiliation is always an object.
     */
    public function mount()
    {
        $user = Auth::user();
        
        // Use firstOrCreate to ensure an Affiliation record exists for the user.
        $this->affiliation = Affiliation::firstOrCreate(
            ['user_id' => $user->id],
            [ 
                'institution' => $user->institution ?? 'N/A',
                'location' => $user->faculty ?? 'N/A', 
                'degree' => $user->department ?? 'N/A',
                'department' => $user->department ?? 'N/A',
                // Assuming 'newImage' is the column name for the image path
                'newImage' => 'default_image.png', 
            ]
        );
        // Ensure the model is loaded when opening the modal
        $this->reset(['uploadedImageFile']);

        $this->institution = $this->affiliation->institution;
        $this->location = $this->affiliation->location;
        $this->degree = $this->affiliation->degree;
        $this->department = $this->affiliation->department;
    }
    
    /**
     * Dispatches the event to open the modal (handled by Alpine).
     */
    public function openEditModal()
    {
        // Re-load the latest data just before editing to ensure the form is fresh
        $this->affiliation->refresh();
        $this->reset(['uploadedImageFile']); // Clear any previous temporary file
        $this->dispatch('show-affiliation-modal');
    }

    /**
     * Validates and saves the affiliation data and handles image upload.
     */
    public function save()
    {
        // 1. Validate all properties
        // We validate the model properties and the temporary file property
        $validatedData = $this->validate([
            'institution' => 'nullable|string|max:255',
            'location'    => 'required|string|max:255',
            'degree'      => 'required|string|max:255',
            'department'  => 'nullable|string|max:255',
            'uploadedImageFile'       => 'nullable|image|max:1024',
        ]);

        // 2. Handle image upload and deletion of old image
        if ($this->uploadedImageFile) {
            
            // Delete old image if it exists and is not the default placeholder
            $currentImagePath = $this->affiliation->newImage;
            if ($currentImagePath && $currentImagePath !== 'default_image.png' && Storage::disk('public')->exists($currentImagePath)) {
                Storage::disk('public')->delete($currentImagePath);
            }
            
            // Store the new image and update the model's property
            $this->affiliation->newImage = $this->uploadedImageFile->store('images', 'public');
        }
        
        // 3. Save the model. Text fields are already updated via wire:model binding.
        // $this->affiliation->save();
        $this->affiliation->update($validatedData);
        
        // 4. Clean up and notify
        $this->uploadedImageFile = null; // Clear temporary file property

        $this->dispatch('hide-affiliation-modal'); 
        $this->dispatch('show-toast', ['message' => 'Affiliation updated successfully!', 'type' => 'success']);
    }

    /**
     * Render the component view.
     */
    public function render()
    {
        return view('livewire.user-profile.affiliation-component');
    }
}
