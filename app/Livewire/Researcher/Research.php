<?php

namespace App\Livewire\Researcher;

use App\Livewire\UserProfile\ProfileInfo;
use App\Models\Affiliation;
use App\Models\Research as ModelsResearch;
use App\Models\User;
use Livewire\Component;

class Research extends Component
{
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
        $query = ModelsResearch::where('user_id', $this->user->id);

        if ($this->publication_type) {
            $query->where('publication_type', $this->publication_type);
        }

        if (!empty($this->search)) {
            $term = '%' . strtolower($this->search) . '%';
            $query->whereRaw('LOWER(title) LIKE ?', [$term]);
        }

        $research = $query->orderBy('id', 'desc')->limit(10)->get();

        return view('livewire.researcher.research', [
            'user' => $this->user,       // ✅ use $this->user
            'research' => $research,
        ]);
    }
}
