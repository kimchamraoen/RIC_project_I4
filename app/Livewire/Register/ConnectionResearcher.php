<?php

namespace App\Livewire\Register;

use Livewire\Component;

class ConnectionResearcher extends Component
{
    public $fullName;
    public $instituteEmail;
    public $otherPassword;
    public $phone;
    public $policyagreement = false;

    protected $rules = [
        'fullName' => 'required|min:3',
        'instituteEmail' => 'required|email',
        'otherPassword' => 'required|min:8',
        'phone' => 'required|regex:/^\+?[0-9]{7,15}$/',
        'policyagreement' => 'accepted',
    ];

    public function submit()
    {
        $this->validate();

        session()->flash('success', '✅ Registration completed successfully!');
        $this->reset(); // clear form fields
    }

    public function render()
    {
        return view('livewire.register.connection-researcher');
    }
}
