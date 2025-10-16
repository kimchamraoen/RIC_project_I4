<div class="bg-gray-200 h-full min-h-screen">
    <div>
        <livewire:components.navbar_user />
    </div>

    <div class="bg-white shadow-sm rounded-md mx-5 mb-6 mt-1">
        <livewire:user-profile.profile-info />
    </div>

    <div class="grid grid-cols-6 mx-70 justify-center mb-10">
        <div class="w-64 h-150 mb-10 grid col-span-1 bg-white shadow-xl border-r border-gray-200">
            <nav class="space-y-2">
                <div class="text-xl p-4 text-gray-800">
                    Research
                </div><hr class="bg-gray-300">

                <a href="{{ route('items', ['type' => '']) }}" id="research-parent" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                    <svg class="w-5 h-5 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Research Items
                </a>

                <a href="{{ route('items', ['type' => 'Artical']) }}" class="menu-item block pl-12 pr-6 py-2 text-sm text-gray-700 hover:bg-gray-50 border-l-4 border-transparent hover:border-gray-200">
                    Artical
                </a>
                <a href="{{ route('items', ['type' => 'Conference']) }}" class="menu-item block pl-12 pr-6 py-2 text-sm text-gray-700 hover:bg-gray-50 border-l-4 border-transparent hover:border-gray-200">
                    Conference paper
                </a>
                <a href="{{ route('items', ['type' => 'Data']) }}" class="menu-item block pl-12 pr-6 py-2 text-sm text-gray-700 hover:bg-gray-50 border-l-4 border-transparent hover:border-gray-200">
                    Data
                </a>
                <a href="{{ route('items', ['type' => 'Research']) }}" class="menu-item block pl-12 pr-6 py-2 text-sm text-gray-700 hover:bg-gray-50 border-l-4 border-transparent hover:border-gray-200">
                    Research
                </a>
                <a href="{{ route('items', ['type' => 'Presentation']) }}" class="menu-item block pl-12 pr-6 py-2 text-sm text-gray-700 hover:bg-gray-50 border-l-4 border-transparent hover:border-gray-200">
                    presentation
                </a>
                <a href="{{ route('items', ['type' => 'Poster']) }}" class="menu-item block pl-12 pr-6 py-2 text-sm text-gray-700 hover:bg-gray-50 border-l-4 border-transparent hover:border-gray-200">
                    Poster
                </a>
                <a href="{{ route('items', ['type' => 'Preprint']) }}" class="menu-item block pl-12 pr-6 py-2 text-sm text-gray-700 hover:bg-gray-50 border-l-4 border-transparent hover:border-gray-200">
                    Preprint
                </a>
                <hr class="my-4 border-t border-gray-100">


                <!-- <a href="#" class="menu-item flex items-center px-6 py-2 text-sm text-gray-700 hover:bg-gray-50">
                    <svg class="w-5 h-5 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9.247a1.213 1.213 0 01-.264-.526 1.25 1.25 0 01.5-1.5 1.25 1.25 0 011.5.5c.092.19.143.407.143.626 0 .428-.17.838-.476 1.132l-.26.26zM20 12c0-4.418-3.582-8-8-8S4 7.582 4 12s3.582 8 8 8 8-3.582 8-8z" />
                    </svg>
                    Questions
                </a>
                <a href="#" class="menu-item flex items-center px-6 py-2 text-sm text-gray-700 hover:bg-gray-50">
                    <svg class="w-5 h-5 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v2l-3-3H9a2 2 0 01-2-2V5a2 2 0 012-2h9a2 2 0 012 2v3z" />
                    </svg>
                    Answer
                </a> -->
            </nav>
        </div>

        <div class="grid col-span-4 ml-30 w-150">
        @if (count($research) > 0)
            <div class="bg-white p-6 rounded-lg shadow-sm h-fit">
                <h3 class="mb-5">Feartured Research</h3><hr class="border-gray-300 mb-5">
                @foreach ($research as $item)
                <div class="">
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
                    </div>
                </div><hr class="bg-gray-300 my-5">
                @endforeach
            </div>    
        @else
                    <!-- <div>No research found for this user.</div> -->
                     <main class="">
                        <div class="h-80">
                            <div class="flex items-center justify-center p-5 bg-white">
                                <div class="text-center border-2 border-dashed border-gray-300 rounded-lg p-10">
                                    <svg class="mx-auto h-16 w-16 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                    </svg>

                                    <h3 class="mt-4 text-lg font-medium text-gray-900">
                                        Your {{ $header_title }}
                                    </h3>
                                    <p class="mt-2 text-sm text-gray-500">
                                        Add your publication to increase the visibility for researwch. Once you've added them, your public will listen here.
                                    </p>
                                    <div class="mt-6">
                                        <a  href="{{ route('research') }}"
                                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            Add {{ $header_title }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
        @endif
        </div>
    </div>

    <livewire:components.footer />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const currentType = new URLSearchParams(window.location.search).get('type');
            const parentLink = document.getElementById('research-parent');
            const childLinks = document.querySelectorAll('.menu-item');

            // If no "type" in query → parent active
            if (!currentType) {
                parentLink.classList.add('text-blue-700', 'bg-blue-50', 'border-l-4', 'border-blue-600', 'font-bold');
            }

            // If a child matches → that child active, parent not
            childLinks.forEach(link => {
                const linkType = new URL(link.href).searchParams.get('type');
                if (currentType === linkType) {
                    link.classList.add('text-blue-700', 'bg-blue-50', 'border-l-4', 'border-blue-600', 'font-bold');
                    parentLink.classList.remove('text-blue-700', 'bg-blue-50', 'border-l-4', 'border-blue-600', 'font-bold');
                }
            });
        });
    </script>

</div>
