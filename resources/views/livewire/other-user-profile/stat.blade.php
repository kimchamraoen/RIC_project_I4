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

    <!-- ----------------------State Overview--------------------- -->
    <div class="bg-white p-5 mb-5 mx-50">
        <h2 class="text-xl font-normal text-gray-700 mb-4">
            Stats overview
        </h2>
        <div class="border-b border-gray-200 mb-6"></div>

        <div class="grid grid-cols-4 gap-4">
            
            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                <p class="text-4xl font-bold text-gray-800">
                    57.2
                </p>
                <p class="text-sm font-normal text-gray-600 mt-1">
                    Research Interest Score
                </p>
            </div>

            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                <p class="text-4xl font-bold text-gray-800">
                    1,616
                    <span class="text-lg font-normal text-gray-500 ml-1 cursor-pointer" title="More information on Reads">
                        &#9432; </span>
                </p>
                <p class="text-sm font-normal text-gray-600 mt-1">
                    Reads
                </p>
            </div>

            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                <p class="text-4xl font-bold text-gray-800">
                    46
                </p>
                <p class="text-sm font-normal text-gray-600 mt-1">
                    Citations
                </p>
            </div>

            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                <p class="text-4xl font-bold text-gray-800">
                    13
                </p>
                <p class="text-sm font-normal text-gray-600 mt-1">
                    Recommendations
                </p>
            </div>

        </div>
    </div>

    <!-- ---------------------------Research Interest Scores------------------ -->
    <div class="p-6 mx-50 bg-white border border-gray-200 rounded-lg shadow-sm mb-5">
        <h2 class="text-xl font-normal text-gray-700 mb-6">
            Research Interest Score
        </h2><hr class="bg-gray-300 mb-3">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-3">
                    Research Interest Score: 57.2
                </h3>

                <div class="flex items-start space-x-6">
                    <div class="flex-shrink-0 w-32 h-32 flex justify-center items-center">
                        <div class="w-full h-full rounded-full border-4 border-gray-100" 
                             style="background: conic-gradient(
                                 #047857 0% 29.75%, /* Citations */
                                 #34d399 29.75% 35.44%, /* Recommendations */
                                 #065f46 35.44% 73.5%, /* Full-text reads */
                                 #10b981 73.5% 100% /* Other reads (adjusted colors for better contrast) */
                             );">
                        </div>
                    </div>

                    <div class="flex-grow">
                        <h4 class="text-md font-semibold text-gray-700 mb-2">Score breakdown</h4>
                        
                        <div class="flex items-center space-x-2 text-sm mb-1">
                            <span class="w-3 h-3 rounded-full bg-teal-800"></span>
                            <p class="text-gray-900 font-medium w-16">29.75%</p>
                            <p class="text-gray-600">Citations</p>
                        </div>

                        <div class="flex items-center space-x-2 text-sm mb-1">
                            <span class="w-3 h-3 rounded-full bg-teal-400"></span>
                            <p class="text-gray-900 font-medium w-16">5.69%</p>
                            <p class="text-gray-600">Recommendations</p>
                        </div>

                        <div class="flex items-center space-x-2 text-sm mb-1">
                            <span class="w-3 h-3 rounded-full bg-teal-600"></span>
                            <p class="text-gray-900 font-medium w-16">38.06%</p>
                            <p class="text-gray-600">Full-text reads</p>
                        </div>

                        <div class="flex items-center space-x-2 text-sm mb-1">
                            <span class="w-3 h-3 rounded-full bg-teal-900"></span>
                            <p class="text-gray-900 font-medium w-16">26.51%</p>
                            <p class="text-gray-600">Other reads</p>
                        </div>

                        <a href="#" class="text-blue-600 hover:text-blue-700 text-xs mt-3 block">
                            View details
                        </a>
                    </div>
                </div>
            </div>

            <div class="pl-8 border-l border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4">
                    Compared to all ResearchGate members
                </h3>

                <div class="relative pt-1">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                        <div style="width: 54%" 
                            class="shadow-none flex flex-col text-center whitespace-nowrap justify-center bg-teal-600">
                        </div>
                    </div>
                    <div class="absolute top-0 transform -translate-x-1/2" style="left: 54%">
                        <svg class="h-3 w-3 text-teal-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 12h10l-5 5-5-5z"></path>
                        </svg>
                    </div>
                </div>

                <p class="text-md text-gray-700 mt-6">
                    **Zühal's** Research Interest Score is **higher than 54%** of ResearchGate members.
                </p>
            </div>
        </div>
    </div>

    <!-- -----------------------h-index------------------ -->
     <div class="bg-white mx-50 mb-10 p-5">
        <h2 class="text-xl font-normal text-gray-700 mb-4">
            h-index
        </h2>
        <div class="border-b border-gray-200 mb-6"></div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            
            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                <p class="text-4xl font-bold text-gray-800">
                    4
                    <span class="text-lg font-normal text-gray-500 ml-1 cursor-pointer" title="More information on h-index">
                        &#9432; </span>
                </p>
                <p class="text-sm font-normal text-gray-600 mt-1">
                    h-index
                </p>
            </div>

            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                <p class="text-4xl font-bold text-gray-800">
                    3
                </p>
                <p class="text-sm font-normal text-gray-600 mt-1">
                    h-index (excl. self-citations)
                </p>
            </div>

            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm md:col-span-1">
                <p class="text-sm font-normal text-green-700 uppercase tracking-wider mb-2">
                    Top cited research
                </p>
                <a href="#" class="text-lg font-semibold text-gray-800 hover:text-blue-600">
                    Investigation of the Evangelism of Sport Team’s Attitudes of the High School Students
                </a>
            </div>
        </div>
    </div>
    

    <livewire:components.footer />
    
</div>
