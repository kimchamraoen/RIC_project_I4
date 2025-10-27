<div>
    <!-- drawer init and show -->
    <div class="text-center">
        <button id="toggle-drawer" class="text-white bg-blue-700 hover:bg-blue-800  font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700" type="button" aria-controls="drawer-navigation">
            Add Research
        </button>
    </div>

    <!-- drawer component -->
    <div id="drawer-background" class="fixed top-0 left-0 w-full h-full bg-gray-600/70 hidden z-30"></div>
    <div id="drawer-navigation" class="fixed top-0 right-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-white" tabindex="-1" aria-labelledby="drawer-navigation-label">
        <h5 id="drawer-navigation-label" class="text-base font-semibold text-black uppercase dark:text-black">Menu</h5>
        <button type="button" id="close-drawer" aria-controls="drawer-navigation" class="text-black bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close menu</span>
        </button><hr class="bg-gray-300 mt-5">
        <div class="py-4 overflow-y-auto">
            @php
                // Define the SVG paths for the icons used in your original HTML
                // NOTE: SVGs are stored as strings for simplicity in the map.
                $svgIcons = [
                    'Artical' => '<path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z"></path><path d="M14 2v6h6"></path><line x1="10" y1="12" x2="14" y2="12"></line><line x1="10" y1="16" x2="16" y2="16"></line><line x1="10" y1="20" x2="12" y2="20"></line>',
                    'Conference paper' => '<path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path>',
                    'Data' => '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="3" x2="9" y2="21"></line>',
                    'Presentation' => '<rect x="3" y="4" width="18" height="12" rx="2" ry="2"></rect><line x1="12" y1="16" x2="12" y2="20"></line><line x1="8" y1="20" x2="16" y2="20"></line>',
                    'Poster' => '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline>',
                    'Preprint' => '<path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><path d="M15 2H9a1 1 0 0 0-1 1v1h8V3a1 1 0 0 0-1-1z"></path><line x1="10" y1="10" x2="14" y2="10"></line><line x1="10" y1="14" x2="16" y2="14"></line><line x1="10" y1="18" x2="14" y2="18"></line>',
                ];

                // MAP: [Menu Label => Form Value]
                $categoryMap = [
                    'Artical'                 => 'Artical', 
                    'Conference paper'        => 'Conference paper', 
                    'Data'                    => 'Data', 
                    'Presentation'            => 'Presentation', 
                    'Poster'                  => 'Poster', 
                    'Preprint'                => 'Preprint', 
                ];
            @endphp

            <ul class="space-y-3 font-medium">
                {{-- Static "Publication" item (since it doesn't fit the dynamic category pattern) --}}
                <li class="flex hover:bg-gray-100 dark:hover:bg-gray-100 p-2 rounded-5">
                    <div class="flex items-center justify-center w-8 h-8 border border-black rounded-full p-2 hover:bg-gray-100 transition-colors">
                        <svg class="w-4 h-4 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                        </svg>
                    </div>
                    {{-- This link should probably go to a generic research landing page --}}
                    <a href="{{ route('research') }}" class="flex items-center px-2 text-black rounded-lg dark:text-black group">Publication</a>
                </li>

                {{-- Dynamic Category Menu Items --}}
                @foreach($categoryMap as $label => $value)
                    {{-- Use $label to fetch the correct SVG path --}}
                    @php
                        $svgPath = $svgIcons[$label] ?? ''; // Get the SVG path, or empty if not found
                    @endphp

                    <li class="flex hover:bg-gray-100 dark:hover:bg-gray-100 p-2 rounded-5">
                        {{-- Icon Container (Copied from original HTML) --}}
                        <div class="flex items-center justify-center w-8 h-8 border border-black rounded-full p-2 hover:bg-gray-100 transition-colors">
                            <svg class="w-4 h-4 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                {{-- Insert the dynamic SVG path here --}}
                                {!! $svgPath !!} 
                            </svg>
                        </div>
                        
                        {{-- Link with Routing Logic --}}
                        <a 
                            href="{{ route('research', ['type' => $value, 'text' => $label]) }}" 
                            class="flex items-center px-2 text-black rounded-lg dark:text-black hover:bg-gray-100 dark:hover:bg-gray-100 group"
                        >
                            {{ $label }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


    <script>
        const toggleDrawer = document.getElementById('toggle-drawer');
        const closeDrawer = document.getElementById('close-drawer');
        const drawer = document.getElementById('drawer-navigation');
        const drawerBackground = document.getElementById('drawer-background');

        toggleDrawer.addEventListener('click', () => {
            drawer.classList.toggle('translate-x-full');
            drawerBackground.classList.toggle('hidden');
        });

        closeDrawer.addEventListener('click', () => {
            drawer.classList.add('translate-x-full');
            drawerBackground.classList.add('hidden');
        });

        // Close drawer when clicking on background
        drawerBackground.addEventListener('click', () => {
            drawer.classList.add('translate-x-full');
            drawerBackground.classList.add('hidden');
        });
    </script>

    <style>
        .transition-transform {
            transition: transform 0.3s ease;
        }
    </style>
</div>