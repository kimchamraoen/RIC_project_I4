<div>
    <div class=" mx-auto bg-white shadow-xl rounded-lg p-6 sm:p-8">
    {{-- Header Section --}}
        <div class="flex items-start space-x-6">
            {{-- Profile Picture --}}
            <div class="flex-shrink-0">
                {{-- Replace with your Livewire image upload/display logic or a static asset --}}
                <img class="h-32 w-32 rounded-full object-cover" 
                            src="{{ asset('storage/' . ($this->user->image ?? 'default/avatar.png')) }}"  
                            alt="Profile Picture">
            </div>

            {{-- Profile Details --}}
            <div class="flex-grow">
                <h1 class="text-3xl font-bold text-gray-900 mb-1">
                    {{ $user->name }}
                </h1>
                <p class="text-lg text-gray-600">
                    {{-- Livewire/Blade Data: $researcher->title --}}
                    Bachelor of Engineering, Developer of Institute of Technology of Cambodia............
                </p>

                {{-- Stats Line --}}
                <div class="flex items-center space-x-8 mt-4 text-sm">
                    {{-- Stat Item 1 --}}
                    <div class="flex items-center text-gray-600">
                        <p class="mr-2">Research Interested Score</p>
                        <span class="text-xl font-semibold text-gray-900">
                            {{-- Livewire/Blade Data: $researcher->research_score --}}
                            0
                        </span>
                    </div>
                    
                    {{-- Stat Item 2 --}}
                    <div class="flex items-center text-gray-600">
                        <p class="mr-2">Citations</p>
                        <span class="text-xl font-semibold text-gray-900">
                            {{-- Livewire/Blade Data: $researcher->citations --}}
                            0
                        </span>
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
        <hr class="border-gray-300 mt-10">
    
        {{-- Bottom Navigation --}}
        <div class="flex items-center justify-between px-7 py-3">
            <nav class="flex gap-7">
                <a href="#"
                class="py-2 border-b-2 {{ request()->routeIs('profile') ? 'text-blue-600 border-blue-600' : 'text-gray-600 border-transparent hover:text-blue-600 hover:border-blue-600' }}">
                Profile
                </a>

                <a href="#"
                class="py-2 border-b-2 {{ request()->routeIs('research') ? 'text-blue-600 border-blue-600' : 'text-gray-600 border-transparent hover:text-blue-600 hover:border-blue-600' }}">
                Research
                </a>

                <a href="#"
                class="py-2 border-b-2 {{ request()->routeIs('state') ? 'text-blue-600 border-blue-600' : 'text-gray-600 border-transparent hover:text-blue-600 hover:border-blue-600' }}">
                State
                </a>

                <a href="#"
                class="py-2 border-b-2 {{ request()->routeIs('following') ? 'text-blue-600 border-blue-600' : 'text-gray-600 border-transparent hover:text-blue-600 hover:border-blue-600' }}">
                Following
                </a>

                <a href="#"
                class="py-2 border-b-2 {{ request()->routeIs('saved') ? 'text-blue-600 border-blue-600' : 'text-gray-600 border-transparent hover:text-blue-600 hover:border-blue-600' }}">
                Saved List
                </a>
            </nav>
        </div>

    </div>
</div>

<script>
    function setActive(el) {
        document.querySelectorAll('.tab-link').forEach(link => {
            link.classList.remove('text-blue-600', 'border-blue-600');
            link.classList.add('text-gray-600', 'border-transparent');
        });

        el.classList.add('text-blue-600', 'border-blue-600');
        el.classList.remove('text-gray-600', 'border-transparent');
    }

    // add click event to all links
    document.querySelectorAll('.tab-link').forEach(link => {
        link.addEventListener('click', function (e) {
            // prevent jump for demo (remove this if you want normal link navigation)
            // e.preventDefault();
            setActive(this);
        });
    });

    // set default active (Profile)
    document.addEventListener('DOMContentLoaded', () => {
        const first = document.querySelector('.tab-link');
        if (first) setActive(first);
    });
</script>