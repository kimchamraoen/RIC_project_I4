<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\search;

class Search extends Component
{
    public $search = '';
    public $userId = ''; 
    public $users = [];
    public $highlightIndex;

    public function resetForm(){
        $this->search= '';
        $this->highlightIndex = 0;
        $this->users = [];
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

        if (strlen($this->search) >= 1) {
            $search = strtolower($this->search);

            $result = User::query()
                ->with('profileInformation') 
                ->where('id', '!=', $userCurrentId) 
                ->where(function ($q) use ($search) {
                    $q->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                    ->orWhereRaw('LOWER(research_unit) LIKE ?', ["%{$search}%"]);
                })
                ->limit(5)
                ->get();
        }
        

        $this->users = $result; 

        return view('livewire.components.search'); 

    }

}
