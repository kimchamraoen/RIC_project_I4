<?php

namespace App\Livewire\Researcher;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Research as ModelsResearch;
use Illuminate\Support\Facades\Auth;

class Search extends Component
{
    use WithPagination;
    public $search='', $research;

    public function render()
    {
        $userId = Auth::id();
    $research = ModelsResearch::where('user_id', $userId)
        ->where('title', 'LIKE', "%{$this->search}%")
        ->paginate(10);

    // Debugging
    \Log::info('Research data: ', ['research' => $research]);

        return view('livewire.researcher.search',[
            'research' => $research
        ]);
    }
}
