<div>
    {{-- About Me Display Section --}}
    <div class="bg-white p-6 rounded-lg shadow-sm">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-bold">About me</h2>
            {{-- This button dispatches the unique event --}}
            <button x-data @click="$dispatch('show-about-me-modal')" class="text-blue-600 hover:text-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </button>
        </div>

        @if (is_null($aboutMe->introduction) && empty($aboutMe->disciplines) && is_null($aboutMe->twitter_profile) && is_null($aboutMe->website))
            <p class="text-gray-500 mt-2">Please fill your information</p>
        @else
            <p class="text-gray-700 mt-2">{{ $aboutMe->introduction }}</p>

            @if (!empty($aboutMe->disciplines))
                <div class="mt-4">
                    <h3 class="text-sm font-bold text-gray-800">Disciplines</h3>
                    <p class="text-gray-600 mt-1">
                        {{ collect($aboutMe->disciplines)->implode(' . ') }}
                    </p>
                </div>
            @endif
        @endif
    </div>

    {{-- The Modal --}}
    <div x-data="{ show: false }"
         x-show="show"
         {{-- Listen for the unique event dispatched by the button --}}
         x-on:show-about-me-modal.window="show = true"
         x-on:hide-about-me-modal.window="show = false"
         x-on:keydown.escape.window="show = false"
         class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">

        <div x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-gray-500/60"></div>

        <div @click.away="show = false"
             x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative w-full max-w-lg bg-white rounded-lg shadow-xl overflow-hidden transform transition-all duration-300">
            
            <form wire:submit.prevent="save">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800">Edit about me</h3>
                </div>

                <div class="p-6 space-y-6">
                    <div>
                        <label for="introduction" class="block text-sm font-medium text-gray-700">Introduction</label>
                        <textarea id="introduction" wire:model.defer="introduction" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Write a short intro to tell people about yourself."></textarea>
                        <p class="text-right text-xs text-gray-500">{{ 500 - strlen($introduction) }}/500</p>
                        @error('introduction') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="disciplines" class="block text-sm font-medium text-gray-700">Disciplines</label>
                        <div class="mt-2 flex flex-wrap gap-2">
                            @foreach ($disciplines as $index => $discipline)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-200 text-gray-800">
                                    {{ $discipline }}
                                    <button type="button" wire:click="removeDiscipline({{ $index }})" class="ml-2 -mr-1 text-gray-400 hover:text-gray-600">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </span>
                            @endforeach
                        </div>
                        <div class="mt-2 flex">
                            <input type="text" wire:model.defer="newDiscipline" class="flex-1 block w-full border-gray-300 rounded-l-md shadow-sm" placeholder="Add a discipline">
                            <button type="button" wire:click="addDiscipline" class="inline-flex items-center px-4 py-2 border border-l-0 border-gray-300 bg-white text-sm font-medium text-gray-700 rounded-r-md hover:bg-gray-50">Add</button>
                        </div>
                    </div>

                    <div>
                        <label for="twitter_profile" class="block text-sm font-medium text-gray-700">X (formerly Twitter) profile</label>
                        <input type="text" id="twitter_profile" wire:model.defer="twitter_profile" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter your profile link or username">
                        <p class="text-xs text-gray-500 mt-1">Only visible to mutual followers</p>
                    </div>

                    <div>
                        <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                        <input type="url" id="website" wire:model.defer="website" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="https://www.example.com">
                        <p class="text-xs text-gray-500 mt-1">Only visible to mutual followers</p>
                    </div>
                </div>

                <div class="px-6 py-4 flex justify-end space-x-3 border-t border-gray-200">
                    <button type="button" @click="show = false" class="px-4 py-2 text-gray-700 font-medium bg-gray-100 rounded-md hover:bg-gray-200">
                        Cancel
                    </button>
                    <button type="submit" @click="show = false" class="px-4 py-2 text-white font-medium bg-blue-600 rounded-md hover:bg-blue-700">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>