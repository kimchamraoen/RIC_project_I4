<div class="bg-gray-200 h-full min-h-screen">
    <div>
        <livewire:components.navbar_user />
    </div>

    {{-- Profile Info Section --}}
    <div class="bg-white shadow-sm rounded-md mx-5 mb-6 mt-1">
        <livewire:user-profile.profile-info />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-5 gap-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10">
        <div class="flex flex-col gap-6 col-span-3">
            <livewire:user-profile.about-me-component />
            <livewire:user-profile.affiliation-component />
            <livewire:user-profile.skill-component />

            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="mb-5">Enhance your profile by adding more details</h3><hr class="border-gray-300 my-1">
                <livewire:user-profile.missing-detail-component />
                <livewire:user-profile.short-introduction-component />
                <livewire:user-profile.degree-component />
                <livewire:user-profile.education-component />
                <livewire:user-profile.editor-role-component />
                <livewire:user-profile.non-editor-role-component />
                <livewire:user-profile.grant-component />
                <livewire:user-profile.member-ship-component />
                <livewire:user-profile.orcid-component />
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="mb-5">Feartured Research</h3><hr class="border-gray-300 my-1">
                @forelse ($research as $item)
                    <div class="p-4">
                        <a href="{{ route('detailPage', ['id' => $item->id]) }}" class="text-xl font-bold text-gray-900">
                            {{ $item->title }}
                        </a>

                        <div class="flex items-center space-x-3 text-sm mb-4 mt-3">
                            <span class="inline-flex items-center px-3 py-1 bg-teal-100 text-teal-800 rounded-5 font-medium">
                                {{ $item->publication_type }}
                            </span>
                            
                            <div class="flex">
                                <span class="text-gray-600 mr-2">{{ $item->month }}</span>
                                <span class="text-gray-600">{{ $item->year }}</span>
                            </div>
                            <span class="text-gray-600">·</span>
                            <span class="text-gray-600">4 Reads</span>
                        </div>

                        <div class="flex items-center space-x-4 text-sm text-gray-500 mb-4">
                            <span class="flex items-center space-x-1">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <span>
                                    @php
                                        $authors = $item->authors;

                                        // Check if it's a string (meaning it hasn't been cast or is not an array)
                                        if (is_string($authors)) {
                                            // Convert the comma-separated string to an array and trim spaces
                                            $authors = array_map('trim', explode(',', $authors)); 
                                        }
                                    @endphp

                                    {{-- Now $authors is guaranteed to be an array --}}
                                    {{ implode(', ', $authors) }}
                                </span>
                            </span>
                        </div>

                        <div class="flex items-end space-x-4">
                            <button class="px-5 py-1 border border-blue-600 bg-white text-blue-600 font-semibold rounded-full hover:bg-blue-600 hover:text-white transition duration-150 ease-in-out">
                                Download
                            </button>

                            <!-- <button class="px-4 py-2 border border-gray-300 text-gray-700 font-semibold rounded-full hover:bg-gray-50 transition duration-150 ease-in-out">
                                Recommend
                            </button>

                            <button class="px-4 py-2 border border-gray-300 text-gray-700 font-semibold rounded-full hover:bg-gray-50 transition duration-150 ease-in-out">
                                Follow
                            </button>
                            
                            <button class="px-4 py-2 border border-gray-300 text-gray-700 font-semibold rounded-full hover:bg-gray-50 transition duration-150 ease-in-out">
                                Share
                            </button> -->
                        </div>
                    </div><hr class="bg-gray-300 mt-3">
                @empty
                    <div>No research found for this user.</div>
                @endforelse
            </div>
        </div>
        <div class="flex flex-col col-span-2">
            <div class="relative w-full max-w-md p-6 bg-white rounded-lg shadow-xl text-center">

                <button class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                </button>
                
                <div class="mx-auto flex items-center justify-center w-12 h-12 bg-blue-100 rounded-full">
                <svg class="h-8 w-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2.94 6.74l8.28-8.28a1.5 1.5 0 012.12 0l4.24 4.24a1.5 1.5 0 010 2.12L10.06 14l-6.24-6.26a1.5 1.5 0 010-2.12zM15 16a2 2 0 100-4 2 2 0 000 4z" />
                </svg>
                </div>

                <div class="mt-4">
                <h3 class="text-xl font-bold text-gray-900"><span>{{ $user->name }}</span>, you're not verified yet</h3>
                <p class="mt-2 text-sm text-gray-500">Confirm your institutional email address to get your verified Badge.</p>
                </div>

                <div class="mt-5">
                <button class="w-full px-4 py-2 text-white font-medium bg-blue-600 rounded-md hover:bg-blue-700">
                    Verify Now
                </button>
                </div>
                
            </div>
        </div>
    </div>

    <livewire:components.footer />
    
</div>
