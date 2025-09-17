<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public $email;
    public $password;

    public function resetField()
    {
        $this->email = '';
        $this->password = '';
    }

     public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('success', 'Login successful.');
            return redirect()->route('home');
        }else {
            session()->flash('error', 'Invalid email or password.');
        }

        $this->resetField(); // Reset fields if login fails
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
