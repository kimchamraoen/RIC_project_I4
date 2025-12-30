<div>
    {{-- Main Profile and Actions --}}
    <div class="flex items-center justify-between px-10 h-55">
        @if ($profileInformation)
            <div class="flex items-center gap-4">
                {{-- Public-facing image --}}
                @if ($profileInformation->image)
                    <img src="{{ asset('storage/' . $profileInformation->image) }}" class="h-32 w-32 rounded-full object-cover" alt="Profile Image">
                @else
                    <img class="h-32 w-32 rounded-full object-cover" src="data:image/jpeg;base64,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" alt="Default Profile Image">
                @endif      
                <div>
                    <div class="my-3 text-3xl font-bold">
                        <span>{{ $profileInformation->name }}</span>
                    </div>
                    <p class="text-gray-500">{{ $profileInformation->institution }}</p>
                    <p class="text-gray-500">{{ $profileInformation->location }}</p>
                    <div class="mb-3 flex gap-5 text-gray-500">
                        <p>0 Citations</p> |
                        <p>0 H-index</p>
                    </div>
                </div>
            </div>
            <button x-data @click="$dispatch('show-modal')"
                wire:click="openEditModal('profileInformation', {{ $profileInformation->id }})"
                class="rounded-lg border border-gray-400 px-3 py-2 text-gray-500 hover:bg-gray-100">
                Edit
            </button>
        @else
            <p class="text-center text-gray-500">No profiles found.</p>
            <button x-data @click="$dispatch('show-modal')"
                wire:click="openEditModal('profileInformation', null)"
                class="rounded-md bg-blue-600 px-4 py-2 font-bold text-white hover:bg-blue-700">
                Create Profile
            </button>
        @endif
    </div>

    {{-- The Modal --}}
    <div x-data="{ show: false }"
         x-show="show"
         x-on:show-modal.window="show = true"
         x-on:hide-modal.window="show = false"
         x-on:keydown.escape.window="show = false"
         class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">

        {{-- Backdrop with blur effect --}}
        <div x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-gray-500/60"></div>

        {{-- Modal Content --}}
        <div @click.away="show = false"
             x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative w-full max-w-md bg-white rounded-lg shadow-xl overflow-hidden transform transition-all duration-300">

            <form wire:submit.prevent="update" id="profileForm">
                {{-- Header --}}
                <div class="px-6 py-4 flex justify-between items-center border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800">Edit Profile</h3>
                    <button type="button" @click="show = false" class="text-gray-400 hover:text-gray-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- Body (Scrollable) --}}
                <div class="p-6 scrollbar overflow-scroll max-h-130">
                    <p class="text-gray-700 font-medium">Edit your profile header</p>
                    
                    {{-- Profile Image --}}
                    <div class="flex flex-col items-center space-y-3">
                        @if ($newImage)
                            <img src="{{ $newImage->temporaryUrl() }}" alt="New Image Preview" class="h-24 w-24 rounded-full object-cover ring-2 ring-gray-300">
                        @elseif ($image)
                            <img src="{{ asset('storage/' . $image) }}?v={{ now()->timestamp }}" alt="Existing Image" class="h-24 w-24 rounded-full object-cover ring-2 ring-gray-300">
                        @else
                            <div class="h-24 w-24 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-sm">No Image</div>
                        @endif
                        <label for="newImage" class="text-blue-600 cursor-pointer hover:underline">Change profile photo</label>
                        <input type="file" id="newImage" wire:model="newImage" class="hidden">
                        @error('newImage') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                    
                    {{-- Name Field --}}
                    <div class="mb-3">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="name" wire:model.defer="name" class="mt-2 block w-full h-10 border px-2 rounded-md focus:border-blue-500 focus:ring-blue-500" required>
                        @error('name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    {{-- Degree --}}
                    <div class="mb-3">
                        <label for="degree" class="block text-sm font-medium text-gray-700">Degree</label>
                        <select id="degree" wire:model.defer="degree" class="mt-2 block w-full h-10 px-2 border rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Enter your degree</option>
                            <option value="Bachelor's Degree">Bachelor's Degree</option>
                            <option value="Master's Degree">Master's Degree</option>
                            <option value="Doctoral Degree">Doctoral Degree</option>
                            <option value="Engineer's Degree">Engineer's Degree</option>
                        </select>
                        @error('degree') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    
                    {{-- Primary Affiliation --}}
                    <div class="mb-3">
                        <label for="institution" class="block text-sm font-medium text-gray-700">Affiliation</label>
                        <input type="text" id="institution" wire:model.defer="institution" class="mt-2 px-2 block w-full h-10 border rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Institution, Student">
                        @error('institution') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    
                    {{-- Current Location --}}
                    <div class="mb-3">
                        <label for="location" class="block text-sm font-medium text-gray-700">Current Location</label>
                        <textarea id="location" wire:model.defer="location" rows="3" class="mt-2 px-2 block w-full border rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Looking for collaborators, a new position, feedback, or something else?"></textarea>
                        @error('location') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>
            </form>

            {{-- Footer --}}
            <div class="flex justify-end space-x-3 px-6 py-4 border-t border-gray-200">
                <button type="button" @click="show = false" class="px-4 py-2 text-gray-700 font-medium bg-gray-100 rounded-md hover:bg-gray-200">
                    Cancel
                </button>
                <button type="submit" form="profileForm" class="px-4 py-2 text-white font-medium bg-blue-600 rounded-md hover:bg-blue-700">
                    Save
                </button>
            </div>
        </div>
    </div>
    
    <hr class="border-gray-300">
    
     {{-- Bottom Navigation --}}
    <div class="flex items-center justify-between px-7 py-3">
        <nav class="flex gap-7">
            <a href="{{ route('profile') }}"
            class="py-2 border-b-2 {{ request()->routeIs('profile') ? 'text-blue-600 border-blue-600' : 'text-gray-600 border-transparent hover:text-blue-600 hover:border-blue-600' }}">
            Profile
            </a>

            <a href="{{ route('items')}}"
            class="py-2 border-b-2 {{ request()->routeIs('items') ? 'text-blue-600 border-blue-600' : 'text-gray-600 border-transparent hover:text-blue-600 hover:border-blue-600' }}">
            Research
            </a>

            <a href="{{ route('stat') }}"
            class="py-2 border-b-2 {{ request()->routeIs('stat') ? 'text-blue-600 border-blue-600' : 'text-gray-600 border-transparent hover:text-blue-600 hover:border-blue-600' }}">
            State
            </a>

            <a href="{{ route('follow') }}"
            class="py-2 border-b-2 {{ request()->routeIs('follow') ? 'text-blue-600 border-blue-600' : 'text-gray-600 border-transparent hover:text-blue-600 hover:border-blue-600' }}">
            Following
            </a>

        </nav>

        <livewire:components.side-bar />
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