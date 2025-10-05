<div class="bg-gray-200 h-full min-h-screen">
    <div>
        <livewire:components.navbar_user />
    </div>

    {{-- Profile Info Section --}}
    <div class="bg-white shadow-sm rounded-md mx-5 mb-6 mt-1">
        <livewire:user-profile.profile-info />
    </div>

    <!-- Livewire component for displaying empty publication statistics -->
    <div class="bg-white mx-80 p-6 mb-8 border border-gray-200 rounded-lg shadow-sm">

        <h2 class="text-xl font-normal text-gray-700 mb-6">
            Overall publications stats
        </h2><hr class="bg-gray-300 mb-5" >

        <!-- 1. Top Row Stats Overview (Grid layout) -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-6 border-b border-gray-200 pb-6">

            <!-- Stat Card 1: Research Interest Score -->
            <div class="flex flex-col border p-5">
                <p class="text-4xl font-bold text-gray-400">
                    --
                </p>
                <p class="text-sm font-normal text-gray-600 mt-1">
                    Research Interest Score
                </p>
                <p class="text-sm font-normal text-gray-400 mt-2">
                    &rarr; ---
                </p>
            </div>

            <!-- Stat Card 2: Reads -->
            <div class="flex flex-col border p-5">
                <p class="text-4xl font-bold text-gray-800">
                    0
                    <span class="text-lg font-normal text-gray-500 ml-1 cursor-pointer" title="More information on Reads">
                        &#9432; <!-- Info icon -->
                    </span>
                </p>
                <p class="text-sm font-normal text-gray-600 mt-1">
                    Reads
                </p>
                <p class="text-sm font-normal text-gray-400 mt-2">
                    &rarr; ---
                </p>
            </div>

            <!-- Stat Card 3: Citations -->
            <div class="flex flex-col border p-5">
                <p class="text-4xl font-bold text-gray-800">
                    0
                </p>
                <p class="text-sm font-normal text-gray-600 mt-1">
                    Citations
                </p>
                <p class="text-sm font-normal text-gray-400 mt-2">
                    &rarr; ---
                </p>
            </div>

            <!-- Stat Card 4: Recommendations -->
            <div class="flex flex-col border p-5">
                <p class="text-4xl font-bold text-gray-800">
                    0
                </p>
                <p class="text-sm font-normal text-gray-600 mt-1">
                    Recommendations
                </p>
                <p class="text-sm font-normal text-gray-400 mt-2">
                    &rarr; ---
                </p>
            </div>
        </div>
        
        <!-- 2. Detail Section (Score breakdown and Call to Action) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4">

            <!-- Left Column: Score Breakdown (Empty State) -->
            <div class="border p-5">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    Research Interest Score: --
                </h3>

                <div class="space-y-3 text-sm">
                    <p class="text-gray-700">
                        <span class="font-bold mr-1">0</span> Citations (excl. self-citations)
                    </p>
                    <p class="text-gray-700">
                        <span class="font-bold mr-1">0</span> Recommendations
                    </p>
                    <p class="text-gray-700">
                        <span class="font-bold mr-1">0</span> Full-text reads*
                    </p>
                    <p class="text-gray-700">
                        <span class="font-bold mr-1">0</span> Other reads*
                    </p>
                </div>

                <p class="text-xs text-gray-500 mt-4">
                    *Reads by ResearchGate members
                </p>

                <a href="#" class="text-blue-600 hover:text-blue-700 text-sm mt-4 block">
                    Learn more about the Research Interest Score
                </a>
            </div>

            <!-- Right Column: Call to Action (CTA) -->
            <div class="flex flex-col items-center justify-center border p-5">
                <!-- Icon Placeholder (simple paper icon with plus) -->
                <div class="text-blue-500 mb-4">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-3-3v6m-7 6h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                
                <h4 class="text-lg font-semibold text-gray-800 mb-2 text-center">
                    Add research to start seeing a score
                </h4>

                <p class="text-sm text-gray-500 mb-4 text-center max-w-sm">
                    When people start interacting with your work you’ll be able to compare yourself to your peers here.
                </p>

                <!-- Call to Action Button -->
                <button class="px-6 py-2 bg-blue-600 text-white font-medium rounded-full shadow-md hover:bg-blue-700 transition duration-150 ease-in-out">
                    Add research
                </button>
            </div>
        </div>
        
        <!-- Footer Link -->
        <div class="pt-6 mt-6 border-t border-gray-300 text-center">
            <a href="#" class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                View individual publication stats
            </a>
        </div>
    </div>

    <livewire:components.footer />

</div>