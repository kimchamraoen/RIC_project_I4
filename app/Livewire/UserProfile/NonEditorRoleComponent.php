<?php

namespace App\Livewire\UserProfile;

use Livewire\Component;
use App\Models\NonEditorRole;
use Illuminate\Support\Facades\Auth;

class NonEditorRoleComponent extends Component
{
    public $role;
    public $journal;
    public $nonEditorRoles;

    public function mount()
    {
        $this->nonEditorRoles = NonEditorRole::firstOrCreate(
            ['user_id' => Auth::id()],
            [
                'role' => null,
                'journal' => null,
            ]
        );

        $this->role = $this->nonEditorRoles->role ?? null;
        $this->journal = $this->nonEditorRoles->journal ?? null;
    }

    public function save()
    {
        $this->validate([
            'role' => 'nullable|string|max:255',
            'journal' => 'nullable|string|max:255',
        ]);

        $this->nonEditorRoles->update([
            'role' => $this->role,
            'journal' => $this->journal,
        ]);

        session()->flash('message', 'Non-Editor Role information updated successfully.');
    }

    public function resetFields()
    {
        $this->role = '';
        $this->journal = '';
    }

    public function render()
    {
        return view('livewire.user-profile.non-editor-role-component');
    }
}
