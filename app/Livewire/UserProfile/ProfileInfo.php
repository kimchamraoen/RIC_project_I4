<?php

namespace App\Livewire\UserProfile;

use Livewire\Component;
use function view;
use function storage_path;
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
    public $image;
    public $newImage;

    public function mount()
{
    $user = Auth::user();

    // Debugging log to check user details
    logger()->info('Authenticated User:', [
        'id' => $user->id,
        'institution' => $user->institution,
        'faculty' => $user->faculty,
        'department' => $user->department,
    ]);

    // Find or create the profile
    $this->profileInformation = ProfileInformation::updateOrCreate(
        ['user_id' => $user->id],
        [
            'name' => $user->name ?? '',
            'institution' => $user->institution ?? '',
            'location' => $user->faculty ?? '', // You might want to adjust this if needed
            'degree' => $user->department ?? '',
            'image' => 'default_profile.png'
        ]
    );

    // Assign properties
    $this->name = $this->profileInformation->name;
    $this->institution = $this->profileInformation->institution;
    $this->location = $this->profileInformation->location;
    $this->degree = $this->profileInformation->degree;
    $this->image = $this->profileInformation->image ?: 'default_profile.png';
}

    public function openEditModal($section, $id = null)
    {
        $this->editingSection = $section;
        $this->editingId = $id;

        // Pre-populate the form
        if ($section === 'profileInformation') {
            $this->name = $this->profileInformation->name;
            $this->institution = $this->profileInformation->institution;
            $this->location = $this->profileInformation->location;
            $this->degree = $this->profileInformation->degree;
            $this->image = $this->profileInformation->image ?: 'default_profile.png'; // Ensure it has a default value
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

        if ($this->newImage) {
            // Use Storage facade for deletion
            if ($this->image && $this->image !== 'default_profile.png' && Storage::disk('public')->exists($this->image)) {
                Storage::disk('public')->delete($this->image);
            }
            $this->image = $this->newImage->store('images', 'public');
        }

        $this->profileInformation->update([
            'name' => $this->name,
            'institution' => $this->institution,
            'location' => $this->location,
            'degree' => $this->degree,
            'image' => $this->image ?: 'default_profile.png', // Ensure a default image is used if none is uploaded
        ]);
        
        // Refresh the profile information
        $this->profileInformation->refresh();

        // Re-populate the component's public properties for the view
        $this->name = $this->profileInformation->name;
        $this->institution = $this->profileInformation->institution;
        $this->location = $this->profileInformation->location;
        $this->degree = $this->profileInformation->degree;
        $this->image = $this->profileInformation->image ?: 'default_profile.png'; // Ensure it has a default value

        // Clear the temporary file upload property
        $this->newImage = null;

        $this->dispatch('hide-modal');
        $this->dispatch('show-toast', ['message' => 'Profile updated successfully!', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.user-profile.profile-info');
    }
}
