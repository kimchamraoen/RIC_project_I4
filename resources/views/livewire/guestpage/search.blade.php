<div class="bg-gray-100">
    <div>
        <livewire:components.navbarguest />
    </div>
    <div class="container mx-auto px-8 py-8 ">
        <div class="text-center mb-5">
            <h2 class="text-4xl font-bold text-gray-800 mb-4 leading-tight">Discover the world's scientific knowledge</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                With publication pages, research and Question, this is everyone can access science.
            </p>
        </div>

        <!-- <div class="flex justify-center mb-5">
            <input 
                type="text" 
                placeholder="Search title, author, publication,....." 
                class="w-full max-w-3xl px-3 py-2 border-2 border-blue-400 rounded-full focus:outline-none focus:border-blue-600 text-lg text-gray-700 shadow-md"
            >
        </div> -->
        <div class="flex justify-center mb-5">
            <livewire:components.search />
        </div>

        <div class="flex justify-center border-b border-gray-300 pb-0">
            <div class="flex space-x-12 text-lg font-medium text-gray-600">
                <button 
                    wire:click="switchTab('publications')" 
                    class="pb-3 {{ $tab === 'publications' ? 'border-b-4 border-blue-500 text-blue-600' : '' }}">
                    Publications
                </button>

                <button 
                    wire:click="switchTab('authors')" 
                    class="pb-3 {{ $tab === 'authors' ? 'border-b-4 border-blue-500 text-blue-600' : '' }}">
                    Authors
                </button>

                <button 
                    wire:click="switchTab('questions')" 
                    class="pb-3 {{ $tab === 'questions' ? 'border-b-4 border-blue-500 text-blue-600' : '' }}">
                    Questions
                </button>
            </div>
        </div>
       

    </div>

    <div class="grid grid-cols-1 md:grid-cols-5 gap-6 mt-8 max-w-7xl mx-50 px-4 sm:px-6 lg:px-8 mb-10">
        <div class="flex flex-col gap-6 col-span-3">

            {{-- Publications Tab --}}
            @if($tab === 'publications')
                <div class="bg-white p-6 rounded-lg shadow-sm h-fit">
                    <h3 class="mb-5">Featured Research</h3>
                    <hr class="border-gray-300 mb-5">
                    
                    @foreach ($research as $item)
                        <div class="">
                            <a href="{{ route('detailPage', ['id' => $item->id]) }}" class="text-xl font-bold text-gray-900">
                                {{ $item->title }}
                                <a href="{{ route('user-profile', $item->user->id) }}">{{ $item->user->name }}</a>
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
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span>
                                        @php
                                            $authors = $item->authors;
                                            if (is_string($authors)) {
                                                $authors = array_map('trim', explode(',', $authors));
                                            }
                                        @endphp
                                        {{ implode(', ', $authors) }}
                                    </span>
                                </span>
                            </div>

                            <div class="flex items-end space-x-4">
                                <button class="px-5 py-1 border border-blue-600 bg-white text-blue-600 font-semibold rounded-full hover:bg-blue-600 hover:text-white transition duration-150 ease-in-out">
                                    Download
                                </button>
                            </div>
                        </div>
                        <hr class="bg-gray-300 my-5">
                    @endforeach
                </div>
            @endif

           {{-- Authors Tab --}}
            @if($tab === 'authors')
                <div class="bg-white p-6 rounded-lg shadow-sm h-fit">
                    <h3 class="mb-5">Authors</h3>
                    <hr class="border-gray-300 mb-5">

                    <div class="">
                        @foreach($authors as $author)
                           @include('livewire.guestpage.authors', ['author' => $author])
                        @endforeach
                    </div>
                </div>
            @endif


            {{-- Questions Tab --}}
            @if($tab === 'questions')
                <div class="bg-white p-6 rounded-lg shadow-sm h-fit">
                    <h3 class="mb-5">Questions</h3>
                     <hr class="border-gray-300 mb-5">

                    <div class="">
                        @include('livewire.guestpage.questions')
                    </div>
                </div>
            @endif

        </div>
    </div>
    <livewire:components.footer />
</div>

