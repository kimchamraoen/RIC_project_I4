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

    // You should use this method only to clear the form fields
    public function resetField()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->phone = '';
    }

    public function mount($user_id = null)
    {
        if ($user_id) {
            $this->user = User::find($user_id);
            if (!$this->user) {
                session()->flash('error', 'User not found.');
                // You should handle this case by redirecting to a proper route
                return redirect()->route('login');
            }
            // Pre-fill form fields if user exists
            $this->name = $this->user->name;
            $this->email = $this->user->email;
            $this->phone = $this->user->phone;
        } else {
            $this->user = new User(); // Create a new instance for new users
        }
    }

    public function submit()
    {
        // Validate the input data from the registration form
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . ($this->user->id ?? 'NULL'),
            'password' => 'required|string|min:8',
            'phone' => 'string|nullable',
        ]);

        // Update or create user based on presence of user_id
        if ($this->user->id) {
            $this->user->name = $this->name;
            $this->user->email = $this->email;
            if ($this->password) {
                $this->user->password = Hash::make($this->password);
            }
            $this->user->phone = $this->phone;
            $this->user->save();
        } else {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'phone' => $this->phone,
            ]);
        }

        // Reset the form fields after successful submission
        $this->resetField();

        // Redirect the user to the login route with a success message
        return redirect()->route('login')->with('success', 'Registration successful. You can now log in.');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
