<div>
    {{-- Main Profile and Actions --}}
    <div class="flex items-center justify-between px-10 h-55">
        @if ($profileInformation)
            <div class="flex items-center gap-4">
                {{-- Public-facing image --}}
                @if ($profileInformation->image)
                    <img src="{{ asset('storage/' . $profileInformation->image) }}" class="h-32 w-32 rounded-full object-cover" alt="Profile Image">
                @else
                    <img src="/images/profile.png" alt="profile image" class="h-32 w-32 rounded-full object-cover"> 
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
                <div class="p-6 scrollbar max-h-160 overflow-y-auto">
                    <p class="text-gray-700 font-medium">Edit your profile header</p>
                    
                    {{-- Profile Image --}}
                    <div class="flex flex-col items-center space-y-3">
                        @if ($newImage)
                            <img src="{{ $newImage->temporaryUrl() }}" alt="New Image Preview" class="h-24 w-24 rounded-full object-cover ring-2 ring-gray-300">
                        @elseif ($image)
                            <img src="{{ asset('storage/' . $image) }}" alt="Existing Image" class="h-24 w-24 rounded-full object-cover ring-2 ring-gray-300">
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
                    </div>
                    
                    {{-- Primary Affiliation --}}
                    <div class="mb-3">
                        <label for="institution" class="block text-sm font-medium text-gray-700">Affiliation</label>
                        <input type="text" id="institution" wire:model.defer="institution" class="mt-2 px-2 block w-full h-10 border rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Institution, Student">
                    </div>
                    
                    {{-- Current Location --}}
                    <div class="mb-3">
                        <label for="location" class="block text-sm font-medium text-gray-700">Current Location</label>
                        <textarea id="location" wire:model.defer="location" rows="3" class="mt-2 px-2 block w-full border rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Looking for collaborators, a new position, feedback, or something else?"></textarea>
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
    <div class="flex items-center justify-between px-3 py-3">
        <nav class="flex gap-4">
            <a class="text-blue-600" aria-current="page" href="{{ route('profile') }}">Profile</a>
            <a class="text-gray-600" href="#">Research</a>
            <a class="text-gray-600" href="#">State</a>
            <a class="text-gray-600" href="#">Following</a>
            <a class="text-gray-600" href="#">Saved List</a>
        </nav>
        <button class="rounded-md bg-blue-600 px-4 py-2 font-bold text-white hover:bg-blue-700">Add Research</button>
    </div>
    
    <hr class="border-gray-300">
</div>