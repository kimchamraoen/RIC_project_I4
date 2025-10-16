<div class="bg-gray-200 h-full min-h-screen">
    
    <livewire:other-user-profile.profile-infos :user="$user"/>

    <!-- ------------------body--------------------- -->
    <div class="grid grid-cols-1 md:grid-cols-6 gap-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10">
        <div class="flex flex-col gap-6 col-span-4">
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="mb-5">About  <span class="text-lg text-black font-bold ml-2">{{ $user->name }}</span></h3>
                <hr class="border-gray-300 my-3">
                <p>{{ $user->introduction }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="mb-5">Affilliation</h3>
                <hr class="border-gray-300 my-3">
                <!-- <img src="{{ asset('storage/' . $user->newImage) }}" 
                    alt="Institution image" 
                    class="w-16 h-16 object-cover rounded-md"> -->

                <p>{{ $user->institution }}</p>
                <p>{{ $user->department }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="mb-5">Feartured Research</h3>
                <hr class="border-gray-300 my-3">
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
                            <!-- <span class="text-gray-600">4 Reads</span> -->
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


        <!-- list top author -->
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
