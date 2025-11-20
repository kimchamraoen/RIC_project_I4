<?php

namespace App\Livewire\Components;

use App\Models\Research;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\search;

class Search extends Component
{
    public $search = '';
    public $userId = ''; 
    public $researchs = [];
    public $highlightIndex= -1;

    public function resetForm(){
        $this->search= '';
        $this->highlightIndex = -1;
        $this->researchs = [];
    }

    public function mount(){
        $this->resetForm();
    }
    public function runSearch()
    {
       if (!empty($this->researchs)) {
        $this->highlightIndex = 0;   // DO NOT auto-select
    }
    }


    // app/Livewire/Components/Search.php (Updated render method)

    public function render()
    {
        $result = collect(); // default empty
        $userCurrentId = Auth::id();
        
        if (strlen($this->search) >= 1) {
            $search = strtolower($this->search);

            $result = Research::with(['user','user.profileInformation'])

                // ->with('user.profileInformation') 
                ->where('user_id', '!=', $userCurrentId) 
                ->where(function ($query) use ($search) {

                    $query->whereRaw('LOWER(title) LIKE ?', ["%{$search}%"])
                        ->orWhereRaw('LOWER(publication_type) LIKE ?', ["%{$search}%"])
                        ->orWhereHas('user', function ($q) use ($search) {
                            $q->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                                ->orWhereRaw('LOWER(research_unit) LIKE ?', ["%{$search}%"]);
                        });

                    })
                

                // ->whereHas('user', function ($q) use ($userCurrentId,$search) {
                //     $q->where('id', '!=', $userCurrentId);
                //     $q->where(function ($q2) use ($search) {
                //         $q2->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                //            ->orWhereRaw('LOWER(research_unit) LIKE ?', ["%{$search}%"]);
                //     });
                // })
                // ->orWhere(function ($q) use ($search) {
                //     $q->whereRaw('LOWER(title) LIKE ?', ["%{$search}%"])
                //     ->orWhereRaw('LOWER(publication_type) LIKE ?', ["%{$search}%"]);
                // })
                ->limit(5)
                ->get();
                // dd($result);
               
        }

        $this->researchs = $result; 

        return view('livewire.components.search'); 

    }

}
