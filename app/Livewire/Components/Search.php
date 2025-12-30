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
    public $highlightIndex;

    public function resetForm(){
        $this->search= '';
        $this->highlightIndex = 0;
        $this->researchs = [];
    }

    // public function incrementHighlight(){
    //     if($this->highlightIndex === count($this->users) - 1){
    //         $this->highlightIndex = 0;
    //         return;
    //     }
    //     $this->highlightIndex++;
    // }

    // public function decrementHighlight(){
    //     if($this->highlightIndex === 0){
    //         $this->highlightIndex = count($this->users) - 1;
    //         return;
    //     }
    //     $this->highlightIndex--;
    // }

    public function mount(){
        $this->resetForm();
    }

    // app/Livewire/Components/Search.php (Updated render method)

    public function render()
    {
        $result = collect(); // default empty
        $userCurrentId = Auth::id();

        // if (strlen($this->search) >= 1) {
        //     $search = strtolower($this->search);

        //     $result = User::query()
        //         ->with('profileInformation') 
        //         ->where('id', '!=', $userCurrentId) 
        //         ->where(function ($q) use ($search) {
        //             $q->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
        //             ->orWhereRaw('LOWER(research_unit) LIKE ?', ["%{$search}%"]);
        //         })
        //         ->limit(5)
        //         ->get();
        // }
        
        if (strlen($this->search) >= 1) {
            $search = strtolower($this->search);

            $result = Research::with(['user','user.profileInformation'])
                ->where('user_id', '!=', $userCurrentId) // exclude yourself
                ->where(function($query) use ($userCurrentId, $search) {
                    
                    // Match user name
                    $query->whereHas('user', function ($q) use ($userCurrentId, $search) {
                        $q->where('id', '!=', $userCurrentId)
                        ->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"]);
                    });

                    // Or match research title/publication_type
                    $query->orWhere(function ($q) use ($search) {
                        $q->whereRaw('LOWER(title) LIKE ?', ["%{$search}%"])
                        ->orWhereRaw('LOWER(publication_type) LIKE ?', ["%{$search}%"]);
                    });
                })
                ->limit(5)
                ->get();
        }


        $this->researchs = $result; 

        return view('livewire.components.search'); 

    }

}
