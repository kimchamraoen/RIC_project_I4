<?php

namespace App\Livewire\UserProfile;

use Livewire\Component;
use App\Models\EditorRole;
use Illuminate\Support\Facades\Auth;

class EditorRoleComponent extends Component
{
    public $role;
    public $journal;
    public $editorRoles;

    public function mount()
    {
        $this->editorRoles = EditorRole::firstOrCreate(
            ['user_id' => Auth::id()],
            [
                'role' => null,
                'journal' => null,
            ]
        );

        $this->role = $this->editorRoles->role ?? null;
        $this->journal = $this->editorRoles->journal ?? null;
    }

    public function save()
    {
        $this->validate([
            'role' => 'nullable|string|max:255',
            'journal' => 'nullable|string|max:255',
        ]);

        $this->editorRoles->update([
            'role' => $this->role,
            'journal' => $this->journal,
        ]);

        session()->flash('message', 'Editor Role information updated successfully.');
    }

    public function render()
    {
        return view('livewire.user-profile.editor-role-component');
    }
}
