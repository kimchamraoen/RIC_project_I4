<?php

namespace App\Livewire\UserProfile;

use Livewire\Component;
use App\Models\MemberShip;
use Illuminate\Support\Facades\Auth;

class MemberShipComponent extends Component
{
    public $member;
    public $memberships;

    public function mount()
    {
        $this->memberships = MemberShip::firstOrCreate(
            ['user_id' => Auth::id()],
            [
                'member' => null,
            ]
        );

        $this->member = $this->memberships->member ?? null;

        // $this->resetFields();
    }

    public function save()
    {
        $validatedData = $this->validate([
            'member' => 'nullable|string|max:255',
        ]);

        $this->memberships->update($validatedData);

        session()->flash('message', 'Membership information updated successfully.');
    }

    public function render()
    {
        return view('livewire.user-profile.member-ship-component');
    }
}
