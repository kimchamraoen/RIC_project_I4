<div class="bg-gray-200 h-full min-h-screen">
    <!-- -------------------other user navbar----------------------- -->
    <div>
        <livewire:components.navbar_user />
    </div>

    <!-- -------------------------profile other user---------------- -->
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

    <!-- --------------------body research------------------ -->
    <div class="grid h-auto grid-cols-6 gap-[-2rem] justify-center px-50">
        <div class="w-64 bg-white shadow-lg h-120 col-span-2 rounded-lg">
            <div class="p-4 border-b">
                <h2 class="text-xl font-bold text-gray-800">Research</h2>
            </div>
            <nav class="mt-2">
                <a href="#" class="flex items-center justify-between p-4 text-gray-700 hover:bg-gray-100">
                    <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m-6 0h2m-4 0v-7a2 2 0 012-2h2a2 2 0 012 2v7m-4 0h4"></path></svg>
                    Research Items
                    </div>
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </a>
                <div class="px-8">
                    <a href="#" class="block p-4 text-gray-600 hover:bg-gray-100">Articles</a>
                    <a href="#" class="block p-4 text-gray-600 hover:bg-gray-100">Conference Paper</a>
                    <a href="#" class="block p-4 text-gray-600 hover:bg-gray-100">Full Text</a>
                    <a href="#" class="block p-4 text-gray-600 hover:bg-gray-100">Data</a>
                </div>
                <!-- <a href="#" class="block p-4 text-gray-600 hover:bg-gray-100">Peer Review Activities</a>
                <a href="#" class="block p-4 text-gray-600 hover:bg-gray-100">Awards</a>
                <a href="#" class="block p-4 text-gray-600 hover:bg-gray-100">Project Leadership</a>
                <a href="#" class="block p-4 text-gray-600 hover:bg-gray-100">Collaborate Project</a>
                <a href="#" class="block p-4 text-gray-600 hover:bg-gray-100">Submit Project Proposal</a> -->
                <a href="#" class="flex items-center p-4 text-gray-600 hover:bg-gray-100">
                    <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v1h8V7a2 2 0 00-2-2H10a2 2 0 00-2 2zm4 4v4m0 0a2 2 0 012 2v1m-2-1a2 2 0 01-2-2V9m4 0a2 2 0 012 2v2m-4-2a2 2 0 01-2 2v2"></path></svg>
                    Answers
                </a>
                <a href="#" class="flex items-center p-4 text-gray-600 hover:bg-gray-100">
                    <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 15v-3m0 0a2 2 0 01-2-2V9a2 2 0 012-2h4a2 2 0 012 2v2a2 2 0 01-2 2m0 0a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2h-2m-4 0a2 2 0 00-2 2v2a2 2 0 002 2h2m0 0a2 2 0 012 2v1a2 2 0 01-2 2h-2m-4-2a2 2 0 01-2-2v-1a2 2 0 012-2h2"></path></svg>
                    Questions
                </a>
                <!-- <a href="#" class="flex items-center p-4 text-gray-600 hover:bg-gray-100">
                    <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6a4 4 0 100 8 4 4 0 000-8zm0 10a8 8 0 100-16 8 8 0 000 16z"></path></svg>
                    Manage file visibility
                </a> -->
            </nav>
        </div>

        <div class="flex-1 w-auto col-span-4 mb-10">
            <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-800">Research Items</h3>
            <div class="relative mt-4">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" placeholder="Search by publication title or keyword" class="w-full py-2 pl-10 pr-4 text-sm text-gray-700 placeholder-gray-500 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            </div>

            <div class="mt-8 space-y-6">
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex justify-between items-start">
                <a href="/detail"><h4 class="text-lg font-bold text-gray-800">Find-Tuning for Question Answering in Low-Resource Languages: A case study on Khmer</h4></a>
                <button class="text-gray-500 hover:text-gray-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zm0 6a2 2 0 110-4 2 2 0 010 4zm0 6a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                </button>
                </div>
                <div class="flex items-center mt-3 space-x-2 text-sm text-gray-600">
                <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Conference Paper</span>
                <span class="ml-2 text-gray-500">December 25 2025 17th</span>
                </div>
                <div class="flex items-center mt-2 space-x-2">
                <div class="flex -space-x-2 overflow-hidden">
                    <img class="inline-block w-8 h-8 rounded-full ring-2 ring-white" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCkmf7FpDslETRiDBiFKDPLbrxFM-wqisohQ&s" alt="Chamraen Kim">
                    <img class="inline-block w-8 h-8 rounded-full ring-2 ring-white" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCkmf7FpDslETRiDBiFKDPLbrxFM-wqisohQ&s" alt="Theary Lach">
                </div>
                <span class="text-sm font-semibold text-gray-800">Chamraen Kim</span>
                <span class="text-sm font-semibold text-gray-800">Theary Lach</span>
                </div>
                <button class="px-4 py-2 mt-4 text-sm font-semibold text-blue-600 border border-blue-500 rounded-md hover:bg-blue-50">Request full text</button>
            </div>

            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex justify-between items-start">
                <h4 class="text-lg font-bold text-gray-800">Find-Tuning for Question Answering in Low-Resource Languages: A case study on Khmer</h4>
                <button class="text-gray-500 hover:text-gray-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zm0 6a2 2 0 110-4 2 2 0 010 4zm0 6a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                </button>
                </div>
                <div class="flex flex-column justify-between pr-5">
                    <div>
                        <div class="flex items-center mt-3 space-x-2 text-sm text-gray-600">
                            <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Conference Paper</span>
                            <span class="ml-2 text-gray-500">December 25 2025 17th</span>
                        </div>
                        <div class="flex items-center mt-2 space-x-2">
                            <div class="flex -space-x-2 overflow-hidden">
                                <img class="inline-block w-8 h-8 rounded-full ring-2 ring-white" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCkmf7FpDslETRiDBiFKDPLbrxFM-wqisohQ&s" alt="Chamraen Kim">
                                <img class="inline-block w-8 h-8 rounded-full ring-2 ring-white" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCkmf7FpDslETRiDBiFKDPLbrxFM-wqisohQ&s" alt="Theary Lach">
                            </div>
                            <span class="text-sm font-semibold text-gray-800">Chamraen Kim</span>
                            <span class="text-sm font-semibold text-gray-800">Theary Lach</span>
                        </div>
                    </div>
                    <div class="relative w-24 h-24 overflow-hidden rounded-md">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTA7zGhqx84SM0jK8wbRrzI0ntg5E2QQy6sw&s" alt="Document Preview" class="absolute inset-0 object-cover w-full h-full">
                    </div>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <button class="px-4 py-2 text-sm font-semibold text-gray-700 border border-gray-300 rounded-md hover:bg-gray-100">Download</button>
                </div>
            </div>
            </div>
        </div>
    </div>

    <livewire:components.footer />
</div>
