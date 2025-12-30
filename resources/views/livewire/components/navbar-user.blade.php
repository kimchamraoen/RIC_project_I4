<div>
    <header class="bg-white shadow-md w-full border-b border-gray-200">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center space-x-8">
                <img src="/images/RIC-Logo.png" alt="RIS logo" class="w-20 h-23 flex justify-content-center align-middle">

                <div class="hidden sm:ml-6 sm:flex sm:space-x-4">
                    <a href="{{ route('home') }}" class="text-gray-900 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                    <a href="{{ route('question') }}" class="text-gray-500 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium">Question</a>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <div class="relative hidden lg:block">
                    <!-- <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span> -->
                    <!-- <input type="text" placeholder="Search..." class="w-64 py-2 pl-10 pr-4 text-sm rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-white placeholder-gray-500"> -->
                    <livewire:components.search />
                </div>

                <div class="flex items-center space-x-3 text-gray-500">
                    <button type="button" class="p-2 rounded-full hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button>
                    
                    <button type="button" class="p-2 rounded-full hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>

                    <div 
                        class="relative" 
                        x-data="{ open: false }" 
                        @click.outside="open = false" 
                        @keydown.escape.window="open = false"
                    >
                        <button 
                            @click="open = !open" 
                            type="button" 
                            class="flex text-sm rounded-full focus:outline-none "
                        >
                            <span class="sr-only">Open user menu</span>
                            <img 
                                class="h-8 w-8 rounded-full object-cover" 
                                src="{{ $profilePhotoUrl }}" 
                                alt="{{ Auth::user() ? Auth::user()->name : 'User' }} Avatar"
                            >
                        </button>

                        <div 
                            x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 z-50 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" 
                            aria-orientation="vertical" 
                            aria-labelledby="user-menu-button"
                            tabindex="-1"
                        >
                            <a href="{{ route('profile') }}" 
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" 
                            role="menuitem" 
                            tabindex="-1"
                            >
                                Your Profile
                            </a>
                            
                            <!-- <a href="#" 
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" 
                            role="menuitem" 
                            tabindex="-1"
                            >
                                Settings
                            </a> -->
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <livewire:logout />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</div>
