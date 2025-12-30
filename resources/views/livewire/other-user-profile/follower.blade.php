<div class="bg-gray-200 h-full min-h-screen">
    
    <livewire:other-user-profile.profile-infos :user="$user"/>

    <!-- ------------------body--------------------- -->
    <div class="flex mx-80 mb-10">
        <div class="w-1/4 bg-white border-r border-gray-200 py-5">
            <div class="h-12 flex items-center bg-gray-100 px-6 font-semibold text-gray-800 border-l-4 border-blue-600">
                Followers
            </div>
            <!-- <div class="h-12 flex items-center px-6 text-gray-700 hover:bg-gray-50 cursor-pointer">
                Followed people
            </div> -->
        </div>

        <div class="w-3/4 p-8 bg-gray-50">
            
            <h1 class="text-2xl font-normal text-gray-800 mb-6">Followers</h1>

            <div class="space-y-4">
                @foreach ($users as $user)
                <div class="flex items-center justify-between p-3 bg-white border border-gray-200 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <img class="h-12 w-12 rounded-full object-cover" src="{{ $user->profileInformation?->image 
                                            ? asset('storage/' . $user->profileInformation->image) 
                                            : asset('default-avatar.png') }}" alt="Hamed Azimi Nojadeh">
                        <div>
                            <p class="text-lg font-semibold text-gray-800">{{ $user->name }}</p>
                            <p class="text-sm text-gray-500">{{ $user->institution }}</p>
                        </div>
                    </div>
                    <button class="px-4 py-1 text-sm font-medium text-blue-600 border border-blue-600 rounded hover:bg-blue-50">
                        Follow
                    </button>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    
    <livewire:components.footer />
</div>
