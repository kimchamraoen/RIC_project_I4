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
    <div class="grid grid-cols-1 md:grid-cols-6 gap-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10">
        <div class="flex flex-col gap-6 col-span-4">
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="mb-5">About  <span class="text-lg text-black font-bold ml-2">{{ $user->name }}</span></h3>
                <hr class="border-gray-300 my-3">
                <p>{{ $aboutMe->introduction }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="mb-5">Feartured Research</h3>
                <hr class="border-gray-300 my-3">

            </div>
        </div>

        <div class="flex flex-col col-span-2">
            <div class="bg-white p-4 rounded-lg shadow-md border border-gray-100">
            {{-- Header Title --}}
            <h2 class="text-xl font-normal text-gray-700 mb-3 pb-1">
                Top co-authors
            </h2><hr class="border-gray-300 mt-4">

            {{-- Author List --}}

            {{-- Author 1: Hamed Golmohammadi (No university shown) --}}
            <div class="flex items-center justify-between py-2 last:border-b-0">
                <div class="flex items-center space-x-3">
                    {{-- Image Placeholder --}}
                    <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-200 flex-shrink-0">
                        <img src="path/to/hamed_image.jpg" alt="Hamed Golmohammadi" class="w-full h-full object-cover">
                    </div>

                    {{-- Text Details --}}
                    <div>
                        <div class="text-gray-800 font-semibold leading-tight">Hamed Golmohammadi</div>
                        {{-- University line is omitted as per the image --}}
                    </div>
                </div>

                {{-- Follow Button --}}
                <button
                    class="px-4 py-1.5 ml-4 text-blue-600 border border-blue-600 rounded-md font-medium hover:bg-blue-50 transition-colors duration-150 flex-shrink-0 text-sm"
                >
                    Follow
                </button>
            </div><hr class="border-gray-300">

            {{-- Author 2: Yakup Can Kurt --}}
            <div class="flex items-center justify-between py-2 last:border-b-0">
                <div class="flex items-center space-x-3">
                    {{-- Image Placeholder --}}
                    <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-200 flex-shrink-0">
                        <img src="path/to/yakup_image.jpg" alt="Yakup Can Kurt" class="w-full h-full object-cover">
                    </div>

                    {{-- Text Details --}}
                    <div>
                        <div class="text-gray-800 font-semibold leading-tight">Yakup Can Kurt</div>
                        <div class="text-sm text-gray-500 leading-tight">Sivas Cumhuriyet Uni...</div>
                    </div>
                </div>

                {{-- Follow Button --}}
                <button
                    class="px-4 py-1.5 ml-4 text-blue-600 border border-blue-600 rounded-md font-medium hover:bg-blue-50 transition-colors duration-150 flex-shrink-0 text-sm"
                >
                    Follow
                </button>
            </div><hr class="border-gray-300">

            {{-- Author 3: Kerim Ali Akgül --}}
            <div class="flex items-center justify-between py-2 last:border-b-0">
                <div class="flex items-center space-x-3">
                    {{-- Image Placeholder --}}
                    <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-200 flex-shrink-0">
                        <img src="path/to/kerim_image.jpg" alt="Kerim Ali Akgül" class="w-full h-full object-cover">
                    </div>

                    {{-- Text Details --}}
                    <div>
                        <div class="text-gray-800 font-semibold leading-tight">Kerim Ali Akgül</div>
                        <div class="text-sm text-gray-500 leading-tight">Sivas Cumhuriyet Uni...</div>
                    </div>
                </div>

                {{-- Follow Button --}}
                <button
                    class="px-4 py-1.5 ml-4 text-blue-600 border border-blue-600 rounded-md font-medium hover:bg-blue-50 transition-colors duration-150 flex-shrink-0 text-sm"
                >
                    Follow
                </button>
            </div><hr class="border-gray-300">

            {{-- Author 4: Oğuzhan Gül --}}
            <div class="flex items-center justify-between py-2  last:border-b-0">
                <div class="flex items-center space-x-3">
                    {{-- Image Placeholder --}}
                    <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-200 flex-shrink-0">
                        <img src="path/to/oguzhan_image.jpg" alt="Oğuzhan Gül" class="w-full h-full object-cover">
                    </div>

                    {{-- Text Details --}}
                    <div>
                        <div class="text-gray-800 font-semibold leading-tight">Oğuzhan Gül</div>
                        <div class="text-sm text-gray-500 leading-tight">Sivas Cumhuriyet Uni...</div>
                    </div>
                </div>

                {{-- Follow Button --}}
                <button
                    class="px-4 py-1.5 ml-4 text-blue-600 border border-blue-600 rounded-md font-medium hover:bg-blue-50 transition-colors duration-150 flex-shrink-0 text-sm"
                >
                    Follow
                </button>
            </div><hr class="border-gray-300">

            {{-- Author 5: Ali Akgül (Last item, note the border logic) --}}
            <div class="flex items-center justify-between py-2">
                <div class="flex items-center space-x-3">
                    {{-- Image Placeholder --}}
                    <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-200 flex-shrink-0">
                        <img src="path/to/ali_image.png" alt="Ali Akgül" class="w-full h-full object-cover">
                    </div>

                    {{-- Text Details --}}
                    <div>
                        <div class="text-gray-800 font-semibold leading-tight">Ali Akgül</div>
                        <div class="text-sm text-gray-500 leading-tight">Siirt University</div>
                    </div>
                </div>

                {{-- Follow Button --}}
                <button
                    class="px-4 py-1.5 ml-4 text-blue-600 border border-blue-600 rounded-md font-medium hover:bg-blue-50 transition-colors duration-150 flex-shrink-0 text-sm"
                >
                    Follow
                </button>
            </div>
        </div>
        </div>
    </div>

    <livewire:components.footer />
    
</div>
