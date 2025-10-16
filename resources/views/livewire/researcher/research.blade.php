<div class="bg-gray-200 h-full min-h-screen">
    <livewire:other-user-profile.profile-infos :user="$user"/>

    <!-- --------------------body research------------------ -->
    <div class="grid h-auto grid-cols-6 gap-[-2rem] justify-center px-50 mb-10">
        <div class="w-64 bg-white shadow-lg h-120 col-span-2 rounded-lg">
            <div class="p-4 border-b">
                <h2 class="text-xl font-bold text-gray-800">Research</h2>
            </div>
            <nav class="mt-2">
                <a href="{{ route('user-research', ['user' => $user->id, 'publication_type' => '']) }}"  id="research-parent" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                    <svg class="w-5 h-5 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Research Items
                </a>

                <a href="{{ route('user-research', ['user' => $user->id, 'publication_type' => 'Article']) }}"  class="menu-item block pl-12 pr-6 py-2 text-sm text-gray-700 hover:bg-gray-50 border-l-4 border-transparent hover:border-gray-200">
                    Artical
                </a>
                <a href="{{ route('user-research', ['user' => $user->id, 'publication_type' => 'Conference']) }}"  class="menu-item block pl-12 pr-6 py-2 text-sm text-gray-700 hover:bg-gray-50 border-l-4 border-transparent hover:border-gray-200">
                    Conference paper
                </a>
                <a href="{{ route('user-research', ['user' => $user->id, 'publication_type' => 'Data']) }}" class="menu-item block pl-12 pr-6 py-2 text-sm text-gray-700 hover:bg-gray-50 border-l-4 border-transparent hover:border-gray-200">
                    Data
                </a>
                <a href="{{ route('user-research', ['user' => $user->id, 'publication_type' => 'Research']) }}" class="menu-item block pl-12 pr-6 py-2 text-sm text-gray-700 hover:bg-gray-50 border-l-4 border-transparent hover:border-gray-200">
                    Research
                </a>
                <a href="{{ route('user-research', ['user' => $user->id, 'publication_type' => 'Presentation']) }}" class="menu-item block pl-12 pr-6 py-2 text-sm text-gray-700 hover:bg-gray-50 border-l-4 border-transparent hover:border-gray-200">
                    presentation
                </a>
                <a href="{{ route('user-research', ['user' => $user->id, 'publication_type' => 'Poster']) }}" class="menu-item block pl-12 pr-6 py-2 text-sm text-gray-700 hover:bg-gray-50 border-l-4 border-transparent hover:border-gray-200">
                    Poster
                </a>
                <a href="{{ route('user-research', ['user' => $user->id, 'publication_type' => 'Preprint']) }}" class="menu-item block pl-12 pr-6 py-2 text-sm text-gray-700 hover:bg-gray-50 border-l-4 border-transparent hover:border-gray-200">
                    Preprint
                </a>
                <hr class="my-4 border-t border-gray-100">
            </nav>
        </div>

        <div class="flex-1 w-auto col-span-4 mb-10">
            <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-800">Research Items</h3>
            <div class="relative mt-4">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" wire:model.debounce.300ms="search"  placeholder="Search by publication title" class="w-full py-2 pl-10 pr-4 text-sm text-gray-700 placeholder-gray-500 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm mt-5">
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
                        </div>
                    </div><hr class="bg-gray-300 mt-3">
                @empty
                    <div>No research found for this user.</div>
                @endforelse
            </div>
        </div>
    </div>

    <livewire:components.footer />
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const currentPath = window.location.pathname;
        const parentLink = document.getElementById('research-parent');
        const childLinks = document.querySelectorAll('.menu-item');

        // Extract the last part of the URL (after /research/)
        const pathParts = currentPath.split('/');
        const currentType = pathParts[pathParts.length - 1] || '';

        let foundActive = false;

        childLinks.forEach(link => {
            const linkPath = new URL(link.href).pathname;
            const linkType = linkPath.split('/').pop();

            if (currentType === linkType) {
                link.classList.add('text-blue-700', 'bg-blue-50', 'border-l-4', 'border-blue-600', 'font-bold');
                foundActive = true;
            } else {
                link.classList.remove('text-blue-700', 'bg-blue-50', 'border-l-4', 'border-blue-600', 'font-bold');
            }
        });

        // If no child active → highlight the parent
        if (!foundActive) {
            parentLink.classList.add('text-blue-700', 'bg-blue-50', 'border-l-4', 'border-blue-600', 'font-bold');
        } else {
            parentLink.classList.remove('text-blue-700', 'bg-blue-50', 'border-l-4', 'border-blue-600', 'font-bold');
        }
    });
</script>
