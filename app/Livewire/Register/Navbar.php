<?php

namespace App\Livewire\Register;

use Livewire\Component;

class Navbar extends Component
{
    public $query = '';

    public function search()
    {
        // You can handle search logic here
        // For example, redirect to a search results page
        return redirect()->to('/search?q=' . $this->query);
    }
    public function render()
    {
        return view('livewire.register.navbar');
    }
}
