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
        
        // 💥 FIX 1: Assign the fetched results to the public $users property
        $this->users = $result; 

        // 💥 FIX 2: Pass the public property to the view 
        // (or remove the array entirely since the property is public)
        return view('livewire.components.search'); 
        
        // Note: If you keep the array, it MUST use the public property:
        /*
        return view('livewire.components.search', [
            'users' => $this->users,
        ]);
        */
    }

    // public function goToProfile($userId) 
    // {
    //     // 1. Find the user (good practice, ensures existence)
    //     $user = User::find($userId); 

    //     if ($user) {
    //         // 2. THIS IS THE KEY FIX: Use 'user' as the key to match the {user} route parameter
    //         return $this->redirectRoute(
    //             'user-profile', 
    //             ['user' => $user->id], // The key 'user' matches the route definition '/profile/{user}'
    //             navigate: true // Likely Livewire navigation
    //         );
    //     }
        
    //     // Fallback if the user is somehow not found
    //     session()->flash('error', 'User with ID ' . $userId . ' not found.');
    //     return;
    // }
}
