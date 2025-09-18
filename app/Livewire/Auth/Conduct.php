<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Conduct extends Component
{
    public $institution, $faculty, $department, $research_unit, $date;

    public function resetField()
    {
        $this->institution = '';
        $this->faculty = '';
        $this->department = '';
        $this->research_unit = '';
        $this->date = '';
    }

    public function conduct()
{
    // Validate the input data
    $this->validate([
        'institution' => 'string|nullable',
        'faculty' => 'string|nullable',
        'department' => 'string|nullable',
        'research_unit' => 'string|nullable',
        'date' => 'date|nullable',
    ]);

    // Create a new User instance
    $user = new User();
    $user->name = 'New User'; // Temporary placeholder
    $user->email = 'placeholder_' . Str::uuid() . '@example.com'; // Temporary unique email
    $user->password = Hash::make('temporary_password'); // A hashed placeholder password
    $user->institution = $this->institution;
    $user->faculty = $this->faculty;
    $user->department = $this->department;
    $user->research_unit = $this->research_unit;
    $user->date = $this->date;
    $user->save();

    // Check if user_id is present
        if ($user->id) {
            // Redirect to the registration page with the new user's ID
            return redirect()->route('register_with_user_id', ['user_id' => $user->id])
                ->with('success', 'Profile information saved. Please complete the final step.');
        } else {
            // Redirect to the standard registration page (optional)
            return redirect()->route('register')
                ->with('success', 'Profile information saved. Please complete the final step.');
        };
    }

    public function render()
    {
        return view('livewire.auth.conduct');
    }
}
