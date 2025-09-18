<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name, $phone, $user;
    public $email;
    public $password;
    // public $confirm_password;

     public function resetField()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        // $this->confirm_password = '';
        $this->phone = '';
    }

    public function mount($user_id)
{
    $this->user = User::find($user_id);

    if (!$this->user) {
        session()->flash('error', 'User not found.');
        return redirect()->route('some.error.route'); // Handle user not found
    }
}

public function submit()
{
    // Validate the input data from the registration form
    $this->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $this->user->id,
        'password' => 'required|string|min:8',
        'phone' => 'string|nullable',
    ]);

    // Update the existing user with the new details
    $this->user->name = $this->name;
    $this->user->email = $this->email;
    $this->user->password = Hash::make($this->password);
    $this->user->phone = $this->phone;

    // Save the updated user record to the database
    $this->user->save();

    // Reset the form fields after successful registration
    $this->resetField();

    // Redirect the user to the login route with a success message
    return redirect()->route('login')->with('success', 'Registration successful. You can now log in.');
}

    public function render()
    {
        return view('livewire.auth.register');
    }
}
