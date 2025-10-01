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
    public Affiliation $affiliation; 
    public $uploadedImageFile; // Temporary property for the file upload input
    public $showModal = false; // Used for initial state if not relying fully on Alpine

    // Define validation rules for model binding and file upload
    protected $rules = [
        'affiliation.institution' => 'nullable|string|max:255',
        'affiliation.location'    => 'required|string|max:255',
        'affiliation.degree'      => 'required|string|max:255',
        'affiliation.department'  => 'nullable|string|max:255',
        'uploadedImageFile'       => 'nullable|image|max:1024', // Max 1MB image
    ];

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
                'newImage' => 'default_image.png',
            ]
        );
    }
    
    /**
     * Dispatches the event to open the modal (handled by Alpine).
     */
    public function openEditModal()
    {
        // Refresh the component state just in case, then open modal
        $this->mount();
        $this->dispatch('show-affiliation-modal');
    }

    /**
     * Validates and saves the affiliation data and handles image upload.
     */
    public function save()
    {
        // 1. Validate all properties
        $this->validate();
        
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
        
        // 3. Save the model. Since $this->affiliation is model-bound, 
        // the text fields are already updated before save() is called.
        $this->affiliation->save();
        
        // 4. Clean up and notify
        $this->uploadedImageFile = null;

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
