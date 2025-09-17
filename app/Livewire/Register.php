<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $confirm_password;

    public function render()
    {
        return view('livewire.register');
    }

    public function resetField()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->confirm_password = '';
    }

    public function submit(){
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|string|min:6|same:password',
        ]);
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        
        $user->save();
        $this->resetField();
        return redirect('/login')->with('success', 'Registration successful.');
    }
}
