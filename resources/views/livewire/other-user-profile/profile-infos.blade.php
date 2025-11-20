<div>
    <div>
        @auth
            <livewire:components.navbar_user />
        @else
            <livewire:components.navbarguest />
        @endauth
    </div>
    <!-- -----------Profile User------------------ -->
    <div class="bg-white shadow-sm rounded-md  mb-3 w-full ">
        <div>
            <div class=" mx-auto bg-white shadow-xl rounded-lg px-6 pt-8 w-full">
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

                <div class="flex items-center justify-between px-7 py-3">
                    <nav class="flex gap-7">
                        <a href="{{ route('user-profile', ['user' => $user->id]) }}"
                            class="py-2 border-b-2 {{ request()->routeIs('user-profile') ? 'text-blue-600 border-blue-600' : 'text-gray-600 border-transparent hover:text-blue-600 hover:border-blue-600' }}">
                            Profile
                        </a>

                        <a href="{{ route('user-research', ['user' => $user->id]) }}"
                            class="py-2 border-b-2 {{ request()->routeIs('user-research') ? 'text-blue-600 border-blue-600' : 'text-gray-600 border-transparent hover:text-blue-600 hover:border-blue-600' }}">
                            Research
                        </a>

                        <a href="{{ route('user-stat', ['user' => $user->id]) }}"
                            class="py-2 border-b-2 {{ request()->routeIs('user-stat') ? 'text-blue-600 border-blue-600' : 'text-gray-600 border-transparent hover:text-blue-600 hover:border-blue-600' }}">
                            State
                        </a>

                        <a href="{{ route('user-follower', ['user' => $user->id]) }}"
                            class="py-2 border-b-2 {{ request()->routeIs('user-follower') ? 'text-blue-600 border-blue-600' : 'text-gray-600 border-transparent hover:text-blue-600 hover:border-blue-600' }}">
                            Following
                        </a>  
                    </nav>
                    
                </div>
            </div>
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