<div class="bg-gray-200 h-full min-h-screen">

    {{-- Profile Info Section --}}
    <div class="bg-white shadow-sm rounded-md mx-5 my-6">
        <livewire:user-profile.profile-info />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mx-5 mb-6"    >
        <div class="flex flex-col gap-6">
            <livewire:user-profile.about-me-component />
            <livewire:user-profile.affiliation-component />
        </div>
    </div>
    
</div>
