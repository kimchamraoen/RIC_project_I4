<?php

namespace App\Livewire\Researcher;

use App\Models\Research as ModelsResearch;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Research extends Component
{
    use WithPagination;

    public User $user;
    public $research, $publication_type, $search=''; 

    public function mount(User $user, $publication_type = null)
    {
        $this->user = $user;
        $this->publication_type = $publication_type;
        // $this->research = $user->research()->get();

        if ($publication_type) {
            $this->research = $user->research()
                ->where('publication_type', $publication_type)
                ->get();
        } else {
            $this->research = $user->research()->get();
        }
    }

    public function render()
    {
        $userId = Auth::id();
    $research = ModelsResearch::where('user_id', $userId)
        ->where('title', 'LIKE', "%{$this->search}%")
        ->paginate(10);

    // Debugging
    \Log::info('Research data: ', ['research' => $research]);

        return view('livewire.researcher.research', [
            'user' => $this->user,       // ✅ use $this->user
            // 'research' => $this-> research,
            'research' => $research
        ]);
    }
}
