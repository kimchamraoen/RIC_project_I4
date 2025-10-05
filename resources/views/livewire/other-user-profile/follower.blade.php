<div class="bg-gray-200 h-full min-h-screen">
    <div>
        <livewire:components.navbar_user />
    </div>

    <!-- -----------Profile User------------------ -->
    <div class="bg-white shadow-sm rounded-md mx-5 mb-5 mt-1">
        <div>
            <div class=" mx-auto bg-white shadow-xl rounded-lg p-6 sm:p-8">
                {{-- Header Section --}}
                <div class="flex items-start space-x-10 px-32 ">
                    {{-- Profile Picture --}}
                    <div class="flex-shrink-0">
                        {{-- Replace with your Livewire image upload/display logic or a static asset --}}
                        <img class="h-32 w-32 rounded-full object-cover" 
                            src="{{ asset('storage/' . ($this->profileInfo->image ?? 'default/avatar.png')) }}"  
                            alt="Profile Picture">
                    </div>

                    {{-- Profile Details --}}
                    <div class="flex-grow">
                        <h1 class="text-3xl font-bold text-gray-900 mb-4 mt-1">
                            {{ $profileInfo->name }}
                        </h1>
                        <div class="flex">
                            <p class="text-mg text-gray-600">
                                {{ $affiliation->degree }}
                            </p>
                            <p class="text-mg text-gray-600 mx-2">at</p>
                            <p class="text-mg text-gray-600">{{ $affiliation->institution }}</p>
                        </div>
                        <div>
                            <p class="text-mg text-gray-600">{{$affiliation->location}}</p>
                        </div>

                        {{-- Stats Line --}}
                        <div class="flex items-center space-x-8 mt-4 text-sm">
                            {{-- Stat Item 1 --}}
                            <div class="flex items-center text-gray-600">
                                <p class="mr-2">Research Interested Score</p>
                                <span class="text-xl font-semibold text-gray-900">
                                    {{-- Livewire/Blade Data: $researcher->research_score --}}
                                    0
                                </span>
                                <span class="ml-7">|</span>
                            </div>
                            
                            {{-- Stat Item 2 --}}
                            <div class="flex items-center text-gray-600">
                                <p class="mr-2">Citations</p>
                                <span class="text-xl font-semibold text-gray-900">
                                    {{-- Livewire/Blade Data: $researcher->citations --}}
                                    0
                                </span>
                                <span class="ml-7">|</span>
                            </div>

                            {{-- Stat Item 3 --}}
                            <div class="flex items-center text-gray-600">
                                <p class="mr-2">H-index</p>
                                <span class="text-xl font-semibold text-gray-900">
                                    {{-- Livewire/Blade Data: $researcher->h_index --}}
                                    0
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="border-gray-300 mt-5">

                <livewire:components.other-user-navigate-page :user="$user" />
            
            </div>
        </div>
    </div>


    <!-- ------------------body--------------------- -->
    <div class="flex mx-80 mb-10">
        <div class="w-1/4 bg-white border-r border-gray-200 py-5">
            <div class="h-12 flex items-center bg-gray-100 px-6 font-semibold text-gray-800 border-l-4 border-blue-600">
                Followers
            </div>
            <div class="h-12 flex items-center px-6 text-gray-700 hover:bg-gray-50 cursor-pointer">
                Followed people
            </div>
        </div>

        <div class="w-3/4 p-8 bg-gray-50">
            
            <h1 class="text-2xl font-normal text-gray-800 mb-6">Followers</h1>

            <div class="space-y-4">
                
                <div class="flex items-center justify-between p-3 bg-white border border-gray-200 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <img class="h-12 w-12 rounded-full object-cover" src="path/to/hamed_image.jpg" alt="Hamed Azimi Nojadeh">
                        <div>
                            <p class="text-lg font-semibold text-gray-800">Hamed Azimi Nojadeh</p>
                            <p class="text-sm text-gray-500">University of Tabriz</p>
                        </div>
                    </div>
                    <button class="px-4 py-1 text-sm font-medium text-blue-600 border border-blue-600 rounded hover:bg-blue-50">
                        Follow
                    </button>
                </div>

                <div class="flex items-center justify-between p-3 bg-white border border-gray-200 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <img class="h-12 w-12 rounded-full object-cover" src="path/to/oguzhan_image.jpg" alt="Oğuzhan Gül">
                        <div>
                            <p class="text-lg font-semibold text-gray-800">Oğuzhan Gül</p>
                            <p class="text-sm text-gray-500">Sivas Cumhuriyet University</p>
                        </div>
                    </div>
                    <button class="px-4 py-1 text-sm font-medium text-blue-600 border border-blue-600 rounded hover:bg-blue-50">
                        Follow
                    </button>
                </div>

                <div class="flex items-center justify-between p-3 bg-white border border-gray-200 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <img class="h-12 w-12 rounded-full object-cover" src="path/to/ali_image.jpg" alt="Ali Suri Allami">
                        <div>
                            <p class="text-lg font-semibold text-gray-800">Ali Suri Allami</p>
                            <p class="text-sm text-gray-500">University of Tehran</p>
                        </div>
                    </div>
                    <button class="px-4 py-1 text-sm font-medium text-blue-600 border border-blue-600 rounded hover:bg-blue-50">
                        Follow
                    </button>
                </div>

                <div class="flex items-center justify-between p-3 bg-white border border-gray-200 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <img class="h-12 w-12 rounded-full object-cover" src="path/to/mohammad_image.jpg" alt="Mohammad Alkhlif">
                        <div>
                            <p class="text-lg font-semibold text-gray-800">Mohammad Alkhlif</p>
                            <p class="text-sm text-gray-500">Sivas Cumhuriyet University</p>
                        </div>
                    </div>
                    <button class="px-4 py-1 text-sm font-medium text-blue-600 border border-blue-600 rounded hover:bg-blue-50">
                        Follow
                    </button>
                </div>

                <div class="flex items-center justify-between p-3 bg-white border border-gray-200 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <div class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-lg">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-lg font-semibold text-gray-800">Samet Alim</p>
                            <p class="text-sm text-gray-500">Sivas Cumhuriyet University</p>
                        </div>
                    </div>
                    <button class="px-4 py-1 text-sm font-medium text-blue-600 border border-blue-600 rounded hover:bg-blue-50">
                        Follow
                    </button>
                </div>

                <div class="flex items-center justify-between p-3 bg-white border border-gray-200 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <img class="h-12 w-12 rounded-full object-cover" src="path/to/hamed_g_image.jpg" alt="Hamed Golmohammadi">
                        <div>
                            <p class="text-lg font-semibold text-gray-800">Hamed Golmohammadi</p>
                            <p class="text-sm text-gray-500">Details not provided</p>
                        </div>
                    </div>
                    <button class="px-4 py-1 text-sm font-medium text-blue-600 border border-blue-600 rounded hover:bg-blue-50">
                        Follow
                    </button>
                </div>
            </div>

        </div>
    </div>
    

    <livewire:components.footer />
    
</div>
