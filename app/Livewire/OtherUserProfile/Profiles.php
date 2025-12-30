<?php

namespace App\Livewire\OtherUserProfile;

use App\Livewire\UserProfile\ProfileInfo;
use App\Models\AboutMe;
use App\Models\Affiliation;
use App\Models\ProfileInformation;
use App\Models\Research;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Profiles extends Component
{
    public User $user;           // the user
    public $research;            // their research collection
    public $users, $aboutMe, $affiliation;

    public function mount(User $user)  // receives the {user} from the route
    {
        $this->user = $user;
        $this->research = $user->research()->get();
        $this->users = User::limit(5)->get();
        $this->aboutMe = AboutMe::where('user_id', $user->id)->first();
        $this->affiliation = Affiliation::where('user_id', $user->id)->first();
    }

    public function download($id)
    {
        $research = Research::findOrFail($id);

        $filePath = $research->file_path;

        if (!$filePath) {
            session()->flash('error', 'File path is missing!');
            return redirect()->back();
        }

        if (Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->download(
                $filePath,
                $research->title . '.pdf'
            );
        }

        session()->flash('error', 'File not found!');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.other-user-profile.profiles', [
            'user' => $this->user,       // ✅ use $this->user
            'research' => $this->research
        ]);
    }
}
