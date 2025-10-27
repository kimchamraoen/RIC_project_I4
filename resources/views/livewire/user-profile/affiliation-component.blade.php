<div>
{{-- Affiliations Display Section --}}
<div class="bg-white p-6 rounded-lg shadow-sm">
<div class="flex items-center justify-between">
<h2 class="text-lg font-bold mb-3">Affiliations</h2>
<button wire:click="openEditModal" class="text-blue-600 hover:text-blue-800">
<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
</svg>
</button>
</div><hr class="border-gray-300">

    {{-- Display data from the $affiliation property --}}
    @if ($affiliation->institution || $affiliation->location || $affiliation->degree || $affiliation->department)
        <div class="flex items-start gap-4 mt-4">
            <div class="w-16 h-16 flex-shrink-0">
                @if ($affiliation->newImage && $affiliation->newImage !== 'default_image.png')
                    <img src="{{ asset('storage/' . $affiliation->newImage) }}" alt="Institution image" class="w-16 h-16 object-cover rounded-md">
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
                    <p class="text-lg font-bold">{{ $affiliation->institution }}</p>
                    <span class="text-xs font-medium px-2 py-1 rounded-full bg-blue-100 text-blue-800">Primary</span>
                </div>
                <p class="text-gray-500">{{ $affiliation->location }}</p>
                <p class="text-gray-500 mt-1">{{ $affiliation->degree }} . {{ $affiliation->department }}</p>
            </div>
        </div>
    @else
        <p class="text-gray-500 mt-2">No affiliations found. Click the edit button to add your information.</p>
    @endif
</div>

{{-- The Modal --}}
<div x-data="{ 
    show: false,
    isUploading: false
}"
x-show="show"
x-on:show-affiliation-modal.window="show = true"
x-on:hide-affiliation-modal.window="show = false"
x-on:keydown.escape.window="show = false"
x-on:livewire-upload-start.window="isUploading = true"
x-on:livewire-upload-finish.window="isUploading = false"
x-on:livewire-upload-error.window="isUploading = false"
class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">

    <div x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-gray-500/60"></div>

    <div @click.away="!isUploading && show = false"
        x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="relative w-full max-w-lg bg-white rounded-lg shadow-xl overflow-hidden transform transition-all duration-300"
        wire:ignore.self> 
        
        <form wire:submit.prevent="save">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-800">Edit Affiliations</h3>
            </div>

            <div class="p-6 space-y-4">
                
                {{-- Profile Picture Upload and Preview --}}
                <div class="flex flex-col items-center space-y-3">
                    {{-- Show temporary image preview from the Livewire property $uploadedImageFile --}}
                    @if ($uploadedImageFile)
                        <img src="{{ $uploadedImageFile->temporaryUrl() }}" alt="New Image Preview" class="h-24 w-24 rounded-full object-cover ring-2 ring-gray-300">
                    {{-- Fallback: Use the persistent component property $newImage for the existing path --}}
                    @elseif ($affiliation->newImage && $affiliation->newImage !== 'default_image.png')
                        {{-- Show existing stored image --}}
                        <img src="{{ asset('storage/' . $affiliation->newImage) }}" alt="Existing Image" class="h-24 w-24 rounded-full object-cover ring-2 ring-gray-300">
                    @else
                        <div class="h-24 w-24 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-sm">No Image</div>
                    @endif

                    <label for="uploadedImageFile" class="text-blue-600 cursor-pointer hover:underline">
                        Change profile photo
                        <span x-show="isUploading" class="text-xs text-gray-500">(Uploading...)</span>
                    </label>
                    {{-- Input binds to the temporary property $uploadedImageFile. This is correct. --}}
                    <input type="file" id="uploadedImageFile" wire:model="uploadedImageFile" class="hidden">
                    {{-- Error message checks the temporary property $uploadedImageFile. This is correct. --}}
                    @error('uploadedImageFile') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                {{-- Institution --}}
                <div>
                    <label for="institution" class="block text-sm font-medium text-gray-700">Institution</label>
                    {{-- Binding is correct --}}
                    <input type="text" id="institution" wire:model.defer="institution" class="mt-1 border p-2 block w-full border-gray-300 rounded-md shadow-sm" placeholder="e.g., University of Science">
                    {{-- Error check is correct --}}
                    @error('affiliation.institution') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Location --}}
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    {{-- Binding is correct --}}
                    <input type="text" id="location" wire:model.defer="location" class="mt-1 border p-2 block w-full border-gray-300 rounded-md shadow-sm" placeholder="e.g., Phnom Penh, Cambodia">
                    {{-- Error check is correct --}}
                    @error('affiliation.location') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Degree --}}
                <div>
                    <label for="degree" class="block text-sm font-medium text-gray-700">Degree</label>
                    {{-- Binding is correct --}}
                    <input type="text" id="degree" wire:model.defer="degree" class="mt-1 border p-2 block w-full border-gray-300 rounded-md shadow-sm" placeholder="e.g., Student, Associate Professor">
                    {{-- Error check is correct --}}
                    @error('affiliation.degree') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Department --}}
                <div>
                    <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                    {{-- Binding is correct --}}
                    <input type="text" id="department" wire:model.defer="department" class="mt-1 border p-2 block w-full border-gray-300 rounded-md shadow-sm" placeholder="e.g., Department of Information and Communication Engineering">
                    {{-- Error check is correct --}}
                    @error('affiliation.department') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="px-6 py-4 flex justify-end space-x-3 border-t border-gray-200">
                <button type="button" @click="$dispatch('hide-affiliation-modal')" class="px-4 py-2 text-gray-700 font-medium bg-gray-100 rounded-md hover:bg-gray-200">
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