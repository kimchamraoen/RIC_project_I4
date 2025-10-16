<?php

namespace App\Livewire\Research;

use App\Models\Research;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Iterms extends Component
{
    public $research = [];
    public $filterType = '';
    public $researchItem;

    public $header_title = 'Feartured Research';

    public function mount()
    {
        // 1. Get the 'type' (publication type) from the URL query parameter
        //    Defaults to an empty string ('') if 'type' is missing.
        $this->filterType = request()->query('type', '');
        
        // 2. Build the initial query, FILTERING BY THE AUTHENTICATED USER'S ID FIRST.
        //    This is the non-negotiable step to ensure user isolation.
        $query = Research::where('user_id', Auth::id()); 

        if (!empty($this->filterType)) {
            // 3a. FILTER BY PUBLICATION TYPE: Applies if 'type' is present in the URL
            $query->where('publication_type', $this->filterType);

            // Update the header title for clarity
            $this->header_title = $this->filterType;
        } else {
            // 3b. ALL DATA: No publication type filter is added, but the user filter remains.
            $this->header_title = 'All Feartured Research';
        }
        
        // 4. Execute the query and load the data for the current user (filtered or unfiltered)
        $this->research = $query
            ->latest() // Optional: Order by the latest record
            ->get(); 
    }

    public function render()
    {
        return view('livewire.research.iterms');
    }
}
