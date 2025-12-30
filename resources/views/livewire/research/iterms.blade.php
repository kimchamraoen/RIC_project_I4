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
                <a href="{{ route('items', ['type' => 'Conference paper']) }}" class="menu-item block pl-12 pr-6 py-2 text-sm text-gray-700 hover:bg-gray-50 border-l-4 border-transparent hover:border-gray-200">
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

                <a href="{{ route('items', ['type' => 'Question']) }}" class="menu-item block pl-12 pr-6 py-2 text-sm text-gray-700 hover:bg-gray-50 border-l-4 border-transparent hover:border-gray-200">
                    <div class="flex">
                        <svg class="w-5 h-5 mr-3 flex text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9.247a1.213 1.213 0 01-.264-.526 1.25 1.25 0 01.5-1.5 1.25 1.25 0 011.5.5c.092.19.143.407.143.626 0 .428-.17.838-.476 1.132l-.26.26zM20 12c0-4.418-3.582-8-8-8S4 7.582 4 12s3.582 8 8 8 8-3.582 8-8z" />
                        </svg>
                        Questions
                    </div>
                </a>
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
                        <!-- <span class="text-gray-600">·</span> -->
                        <!-- <span class="text-gray-600">4 Reads</span> -->
                    </div>

                    <div class="flex items-center space-x-4 text-sm text-gray-500 mb-4">
                        <span class="flex items-center space-x-1">
                            <!-- <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg> -->
                            <span class="flex">
                                <svg class="w-4.5 h-4.5 text-blue-400 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <a class="mr-2" href="{{ route('user-profile', $item->user->id) }}">{{$item->user->name}}</a>
                                @php
                                    $authors = $item->authorsList();
                                @endphp
                                @foreach($authors as $author)
                                   <div class="flex">
                                        <svg class="w-4.5 h-4.5 text-blue-400 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        <a class="mr-2" href="{{ route('user-profile', $author->id) }}"> {{ $author->name }}</a>
                                   </div>
                                @endforeach
                            </span>
                        </span>
                    </div>

                    <div class="flex justify-between items-center">
                        <div class="flex space-x-4">
                            <button type="button" wire:click="download({{ $item->id }})" class="px-5 py-1 border border-blue-600 bg-white text-blue-600 font-semibold rounded-full hover:bg-blue-600 hover:text-white transition duration-150 ease-in-out">
                                Download
                            </button>
                        </div>
                        <div>
                                <!-- button edit -->
                                <button wire:click='edit({{ $item->id }})' class="p-2 text-blue-600">
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 640 640">
                                        <path d="M505 122.9L517.1 135C526.5 144.4 526.5 159.6 517.1 168.9L488 198.1L441.9 152L471 122.9C480.4 113.5 495.6 113.5 504.9 122.9zM273.8 320.2L408 185.9L454.1 232L319.8 366.2C316.9 369.1 313.3 371.2 309.4 372.3L250.9 389L267.6 330.5C268.7 326.6 270.8 323 273.7 320.1zM437.1 89L239.8 286.2C231.1 294.9 224.8 305.6 221.5 317.3L192.9 417.3C190.5 425.7 192.8 434.7 199 440.9C205.2 447.1 214.2 449.4 222.6 447L322.6 418.4C334.4 415 345.1 408.7 353.7 400.1L551 202.9C579.1 174.8 579.1 129.2 551 101.1L538.9 89C510.8 60.9 465.2 60.9 437.1 89zM152 128C103.4 128 64 167.4 64 216L64 488C64 536.6 103.4 576 152 576L424 576C472.6 576 512 536.6 512 488L512 376C512 362.7 501.3 352 488 352C474.7 352 464 362.7 464 376L464 488C464 510.1 446.1 528 424 528L152 528C129.9 528 112 510.1 112 488L112 216C112 193.9 129.9 176 152 176L264 176C277.3 176 288 165.3 288 152C288 138.7 277.3 128 264 128L152 128z"/>
                                    </svg>
                                </button>

                                <!-- button delete -->
                                <button wire:click='delete({{ $item->id }})' class="p-2 text-red-600">
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 640 640">
                                        <path d="M232.7 69.9L224 96L128 96C110.3 96 96 110.3 96 128C96 145.7 110.3 160 128 160L512 160C529.7 160 544 145.7 544 128C544 110.3 529.7 96 512 96L416 96L407.3 69.9C402.9 56.8 390.7 48 376.9 48L263.1 48C249.3 48 237.1 56.8 232.7 69.9zM512 208L128 208L149.1 531.1C150.7 556.4 171.7 576 197 576L443 576C468.3 576 489.3 556.4 490.9 531.1L512 208z"/>
                                    </svg>
                                </button>
                        </div>
                    </div>
                </div><hr class="bg-gray-300 my-5">
                @endforeach
            </div>    
        @else
             @if ($header_title === 'Question')
                <!-- Show Questions Box -->
                <livewire:research.question />
            @else
                <!-- Show Default Empty State (Add publication) -->
                <main class="">
                    <div class="h-80">
                        <div class="flex items-center justify-center p-5 bg-white">
                            <div class="text-center border-2 border-dashed border-gray-300 rounded-lg p-10">
                                <svg class="mx-auto h-16 w-16 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                </svg>

                                <h3 class="mt-4 text-lg font-medium text-gray-900">
                                    Your {{ $header_title }}
                                </h3>

                                <p class="mt-2 text-sm text-gray-500">
                                    Add your publication to increase the visibility of your research.
                                    Once you've added them, they will appear here.
                                </p>

                                <div class="mt-6">
                                    <a href="{{ route('research') }}"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Add {{ $header_title }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            @endif
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
