<div>
    <div class="p-6 bg-white rounded-lg shadow-md w-auto px-24">
        <div class="flex justify-between items-start">
            <div class="flex-1 pr-4 max-w-200">
                
                    <a href="{{ route('user-profile', $research->user->id) }}">
                        <h1>{{$research->user->name}}</h1>
                    </a>

                <div class="border bg-blue-100 w-fit py-1 px-2 mb-2">{{ $research->publication_type }}</div>
                <h1 class="text-2xl font-bold text-gray-800">{{ $research->title }}</h1>
                <p class="mt-2 text-sm text-gray-600">
                    <div class="flex">
                        <span class="mr-3">{{ $research->month }}</span>
                        <span>{{ $research->year }}</span>
                    </div>
                    <span class="font-semibold text-gray-700">Retos</span> 68:212-223<br>
                    <!-- <span class="text-blue-600">DOI: 10.47197/retos.v68.108943</span><br> -->
                    <!-- <span class="text-gray-500">LicenseCC BY-NC-ND 4.0</span> -->
                </p>
            </div>
            <div class="flex-shrink-0 text-right">
                <div class="space-y-1 text-sm text-gray-600">
                    <div class="flex items-center justify-end">
                        <span class="mr-2">Research Interest Score</span>_____________________
                        <span class="font-bold text-gray-800">0.6</span>
                    </div>
                    <div class="flex items-center justify-end">
                        <span class="mr-2">Citations</span>_______________________________________
                        <span class="font-bold text-gray-800">1</span>
                    </div>
                    <div class="flex items-center justify-end">
                        <span class="mr-2">Recommendations</span>____________________________
                        <span class="font-bold text-gray-800">0</span>
                    </div>
                    <div class="flex items-center justify-end">
                        <span class="mr-2">Reads</span>_____________________________________
                        <span class="font-bold text-gray-800">32</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                </div>
                <a href="#" class="mt-2 text-sm text-blue-600 hover:underline">Learn about stats on ResearchGate</a>
            </div>
        </div>

        <div class="flex items-center mt-4 space-x-4">
            <div class="flex items-center space-x-2">
                <!-- <img src="" alt="profile authors" class="w-8 h-8 rounded-full"> -->
                {{-- Public-facing image --}}
                <div class="flex items-center mt-2 space-x-2">
                    @foreach ($authors as $author)
                        <div class="flex items-center">

                            <img 
                                src="{{ asset('storage/' . ($author->profileInformation->image ?? 'default.png')) }}"
                                class="w-8 h-8 rounded-full object-cover"
                                alt="Author Image">

                            <a href="{{ route('user-profile', $author->id) }}"
                            class="text-sm font-semibold text-gray-800">
                            
                            </a>

                        </div>
                    @endforeach
                </div>

                <span class="text-sm font-semibold text-gray-800">
                    <span>
                        @php
                            $authors = $research->authorsList();
                           
                        @endphp
                      

                        @foreach($authors as $author)
                           <a href="{{ route('user-profile', $author->id) }}"> {{ $author->name }}</a>
                        @endforeach
                    </span>
                </span>
            </div>
        </div>

        <hr class="my-6 border-gray-200">

        <div class="flex items-center justify-between">
            <div class="flex space-x-6 text-gray-700">
            <a href="/overview" class="pb-2 font-semibold text-blue-600 border-b-2 border-blue-600">Overview</a>
            <a href="#" class="pb-2 hover:text-gray-900">States</a>
            <a href="#" class="pb-2 hover:text-gray-900">Citations</a>
            <a href="/reference" class="pb-2 hover:text-gray-900">References</a>
            </div>
            <div class="flex space-x-4">
            <button class="px-6 py-2 text-sm font-semibold text-white bg-blue-600 rounded-md hover:bg-blue-700">Download</button>
            <!-- <div class="relative">
                <button class="flex items-center px-4 py-2 text-sm font-semibold text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">
                Share
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
            </div>
            <div class="relative">
                <button class="flex items-center px-4 py-2 text-sm font-semibold text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">
                More
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
            </div> -->
            </div>
        </div>
    </div>
</div>
