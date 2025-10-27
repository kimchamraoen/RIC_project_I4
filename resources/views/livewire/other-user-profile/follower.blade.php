<div class="bg-gray-200 h-full min-h-screen">
    
    <livewire:other-user-profile.profile-infos :user="$user"/>

    <!-- ------------------body--------------------- -->
    <div class="flex mx-80 mb-10">
        <div class="w-1/4 bg-white border-r border-gray-200 py-5">
            <div class="h-12 flex items-center bg-gray-100 px-6 font-semibold text-gray-800 border-l-4 border-blue-600">
                Followers
            </div>
            <div class="h-12 flex items-center px-6 text-gray-700 hover:bg-gray-50 cursor-pointer">
                Followed people
            </div>
        </div>

        <div class="w-3/4 p-8 bg-gray-50">
            
            <h1 class="text-2xl font-normal text-gray-800 mb-6">Followers</h1>

            <div class="space-y-4">
                
                <div class="flex items-center justify-between p-3 bg-white border border-gray-200 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <img class="h-12 w-12 rounded-full object-cover" src="path/to/hamed_image.jpg" alt="Hamed Azimi Nojadeh">
                        <div>
                            <p class="text-lg font-semibold text-gray-800">Hamed Azimi Nojadeh</p>
                            <p class="text-sm text-gray-500">University of Tabriz</p>
                        </div>
                    </div>
                    <button class="px-4 py-1 text-sm font-medium text-blue-600 border border-blue-600 rounded hover:bg-blue-50">
                        Follow
                    </button>
                </div>

                <div class="flex items-center justify-between p-3 bg-white border border-gray-200 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <img class="h-12 w-12 rounded-full object-cover" src="path/to/oguzhan_image.jpg" alt="Oğuzhan Gül">
                        <div>
                            <p class="text-lg font-semibold text-gray-800">Oğuzhan Gül</p>
                            <p class="text-sm text-gray-500">Sivas Cumhuriyet University</p>
                        </div>
                    </div>
                    <button class="px-4 py-1 text-sm font-medium text-blue-600 border border-blue-600 rounded hover:bg-blue-50">
                        Follow
                    </button>
                </div>

                <div class="flex items-center justify-between p-3 bg-white border border-gray-200 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <img class="h-12 w-12 rounded-full object-cover" src="path/to/ali_image.jpg" alt="Ali Suri Allami">
                        <div>
                            <p class="text-lg font-semibold text-gray-800">Ali Suri Allami</p>
                            <p class="text-sm text-gray-500">University of Tehran</p>
                        </div>
                    </div>
                    <button class="px-4 py-1 text-sm font-medium text-blue-600 border border-blue-600 rounded hover:bg-blue-50">
                        Follow
                    </button>
                </div>

                <div class="flex items-center justify-between p-3 bg-white border border-gray-200 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <img class="h-12 w-12 rounded-full object-cover" src="path/to/mohammad_image.jpg" alt="Mohammad Alkhlif">
                        <div>
                            <p class="text-lg font-semibold text-gray-800">Mohammad Alkhlif</p>
                            <p class="text-sm text-gray-500">Sivas Cumhuriyet University</p>
                        </div>
                    </div>
                    <button class="px-4 py-1 text-sm font-medium text-blue-600 border border-blue-600 rounded hover:bg-blue-50">
                        Follow
                    </button>
                </div>

                <div class="flex items-center justify-between p-3 bg-white border border-gray-200 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <div class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-lg">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-lg font-semibold text-gray-800">Samet Alim</p>
                            <p class="text-sm text-gray-500">Sivas Cumhuriyet University</p>
                        </div>
                    </div>
                    <button class="px-4 py-1 text-sm font-medium text-blue-600 border border-blue-600 rounded hover:bg-blue-50">
                        Follow
                    </button>
                </div>

                <div class="flex items-center justify-between p-3 bg-white border border-gray-200 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <img class="h-12 w-12 rounded-full object-cover" src="path/to/hamed_g_image.jpg" alt="Hamed Golmohammadi">
                        <div>
                            <p class="text-lg font-semibold text-gray-800">Hamed Golmohammadi</p>
                            <p class="text-sm text-gray-500">Details not provided</p>
                        </div>
                    </div>
                    <button class="px-4 py-1 text-sm font-medium text-blue-600 border border-blue-600 rounded hover:bg-blue-50">
                        Follow
                    </button>
                </div>
            </div>

        </div>
    </div>
    

    <livewire:components.footer />
    
</div>
