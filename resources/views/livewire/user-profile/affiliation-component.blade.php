<div>
    {{-- Affiliations Display Section --}}
    <div class="bg-white p-6 rounded-lg shadow-sm">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-bold">Affiliations</h2>
            {{-- FIX 1: Use the Livewire component's openModal method to manage state and opening --}}
            <button wire:click="openModal" class="text-blue-600 hover:text-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </button>
        </div>

        @if ($profileInformation->institution || $profileInformation->location || $profileInformation->degree || $profileInformation->department)
            <div class="flex items-start gap-4 mt-4">
                {{-- Display the logo/image using the 'newImage' column --}}
                <div class="w-16 h-16 flex-shrink-0">
                    @if ($profileInformation->newImage)
                        <img src="{{ asset('storage/' . $profileInformation->newImage) }}" alt="Institution image" class="w-16 h-16 object-cover rounded-md">
                    @else
                        {{-- SVG Placeholder --}}
                        <div class="w-16 h-16 rounded-md bg-gray-200 flex items-center justify-center text-gray-500">
                            <svg class="h-10 w-10 text-gray-400" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 4a4 4 0 100 8 4 4 0 000-8zm0 10c-4.42 0-8 1.79-8 4v2h16v-2c0-2.21-3.58-4-8-4z"/>
                            </svg>
                        </div>
                    @endif
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <p class="text-lg font-bold">{{ $profileInformation->institution }}</p>
                        <span class="text-xs font-medium px-2 py-1 rounded-full bg-blue-100 text-blue-800">Primary</span>
                    </div>
                    <p class="text-gray-500">{{ $profileInformation->location }}</p>
                    <p class="text-gray-500 mt-1">{{ $profileInformation->degree }} . {{ $profileInformation->department }}</p>
                </div>
            </div>
        @else
            <p class="text-gray-500 mt-2">No affiliations found. Click the edit button to add your information.</p>
        @endif
    </div>

    {{-- The Modal (Using wire:model for visibility) --}}
    {{-- FIX 2: Bind the x-show property directly to the Livewire public property $showModal --}}
    <div x-data="{ show: @entangle('showModal') }"
        x-show="show"
        x-on:keydown.escape.window="$wire.closeModal()"
        class="fixed inset-0 z-50 flex items-center justify-center p-4" 
        style="display: none;">

        <div x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-500/60"></div>

        <div @click.away="$wire.closeModal()"
            x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="relative w-full max-w-lg bg-white rounded-lg shadow-xl overflow-hidden transform transition-all duration-300">
            
            <form wire:submit.prevent="save">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800">Edit Affiliations</h3>
                </div>

                <div class="p-6 space-y-4">
                    
                    {{-- Profile Picture Upload and Preview (The new image editing section) --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Institution Logo/Image</label>
                        <div class="flex items-center space-x-4">
                            
                            {{-- Current/Temporary Image Display --}}
                            <div class="relative w-16 h-16 rounded-md overflow-hidden flex-shrink-0 border border-gray-300">
                                @if (isset($newImage) && is_object($newImage))
                                    {{-- Livewire temporary URL for preview --}}
                                    <img src="{{ $newImage->temporaryUrl() }}" alt="New Institution Image" class="w-full h-full object-cover">
                                @elseif ($currentImagePath)
                                    {{-- Saved Image using currentImagePath (which reflects the 'newImage' DB column) --}}
                                    <img src="{{ asset('storage/' . $currentImagePath) }}" alt="Current Institution Image" class="w-full h-full object-cover">
                                @else
                                    {{-- Placeholder SVG --}}
                                    <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500">
                                        <svg class="h-10 w-10 text-gray-400" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 4a4 4 0 100 8 4 4 0 000-8zm0 10c-4.42 0-8 1.79-8 4v2h16v-2c0-2.21-3.58-4-8-4z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            {{-- File Input and Controls --}}
                            <div class="flex-1 space-y-1">
                                <label for="newImage" class="cursor-pointer bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium py-2 px-4 rounded-md transition duration-150 ease-in-out inline-flex items-center shadow-sm">
                                    Choose New Image
                                </label>
                                {{-- The Livewire wire:model property to hold the uploaded file --}}
                                <input type="file" id="newImage" wire:model="newImage" class="hidden">

                                {{-- Remove Image Button (using $currentImagePath for accurate check) --}}
                                @if ($currentImagePath || (isset($newImage) && is_object($newImage)))
                                    <button type="button" wire:click="removeImage" class="text-xs text-red-600 hover:text-red-800 font-medium ml-2">
                                        Remove Image
                                    </button>
                                @endif
                                
                                <div wire:loading wire:target="newImage" class="text-xs text-blue-600">Uploading...</div>
                                @error('newImage') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Institution --}}
                    <div>
                        <label for="institution" class="block text-sm font-medium text-gray-700">Institution</label>
                        <input type="text" id="institution" wire:model.defer="institution" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="e.g., University of Science">
                        @error('institution') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Location --}}
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                        <input type="text" id="location" wire:model.defer="location" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="e.g., Phnom Penh, Cambodia">
                        @error('location') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Degree --}}
                    <div>
                        <label for="degree" class="block text-sm font-medium text-gray-700">Degree</label>
                        <input type="text" id="degree" wire:model.defer="degree" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="e.g., Student, Associate Professor">
                        @error('degree') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Department --}}
                    <div>
                        <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                        <input type="text" id="department" wire:model.defer="department" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="e.g., Department of Information and Communication Engineering">
                        @error('department') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="px-6 py-4 flex justify-end space-x-3 border-t border-gray-200">
                    {{-- FIX 3: Use closeModal Livewire method for cancel --}}
                    <button type="button" wire:click="closeModal" class="px-4 py-2 text-gray-700 font-medium bg-gray-100 rounded-md hover:bg-gray-200">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 text-white font-medium bg-blue-600 rounded-md hover:bg-blue-700">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
