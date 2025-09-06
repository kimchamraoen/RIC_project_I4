<?php

namespace App\Livewire\Login;

use Livewire\Component;

class Form extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
        // ✅ Redirect to conduct page after successful login
        return redirect()->to('/conduct');
        } else {
            $this->addError('email', 'Invalid login credentials');
        }

        // Auth logic here
    }
    public function render()
    {
        
        return view('livewire.login.form');
    }
}
