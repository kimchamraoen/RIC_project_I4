<div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    {{-- About Me Display Section --}}
    <div class="bg-white p-6 rounded-lg shadow-sm">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-bold mb-3">About me</h2>
            {{-- This button dispatches the unique event --}}
            <button x-data @click="$dispatch('show-about-me-modal')" class="text-blue-600 hover:text-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </button>
        </div><hr class="border-gray-300">

        @if (is_null($aboutMe->introduction) && empty($aboutMe->disciplines) && is_null($aboutMe->twitter_profile) && is_null($aboutMe->website))
            <p class="text-gray-500 mt-2">Please fill your information</p>
        @else
            <p class="text-gray-700 mt-2">{{ $aboutMe->introduction }}</p>  
            <span>
                                    @php
                                        $disciplines = $aboutMe->disciplines;

                                        // Check if it's a string (meaning it hasn't been cast or is not an array)
                                        if (is_string($disciplines)) {
                                            // Convert the comma-separated string to an array and trim spaces
                                            $disciplines = array_map('trim', explode(',', $disciplines)); 
                                        }
                                    @endphp

                                    {{-- Now $authors is guaranteed to be an array --}}
                                    {{ implode(', ', $disciplines) }}
                                </span>
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

        {{-- Backdrop with blur effect --}}
        <div x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-gray-500/60"></div>
             
        {{-- Modal Content --}}
        <div @click.away="show = true"
             x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative w-full max-w-lg bg-white rounded-lg shadow-xl overflow-hidden transform transition-all duration-300">
            
            <form wire:submit.prevent="save">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800">Edit about me</h3>
                </div>

                <div class="p-6 space-y-6 overflow-scroll max-h-130">
                    <div>
                        <label for="introduction" class="block text-sm font-medium text-gray-700">Introduction</label>
                        <textarea id="introduction" wire:model.defer="introduction" rows="4" class="mt-1 block w-full border rounded-md shadow-sm p-2" placeholder="Write a short intro to tell people about yourself."></textarea>
                        <p class="text-right text-xs text-gray-500">{{ 500 - strlen($introduction) }}/500</p>
                        @error('introduction') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <div class="mb-4">
                            <label for="disciplines" class="block text-sm mb-2 font-medium text-gray-700">Disciplines</label>
                            <div class="authors-container border p-3">
                                <div id="authorsInput" class="authors-input flex flex-wrap items-center gap-2 py-3 border-b-2 border-gray-300 bg-transparent min-h-[46px] focus-within:border-blue-700 transition-colors">
                                            <!-- Display existing authors from Livewire -->
                                            @if($disciplines && is_array($disciplines))
                                                @foreach($disciplines as $discipline)
                                                    <div class="author-tag inline-flex items-center bg-blue-50 border border-blue-200 rounded-full py-1 pl-3 pr-2 text-blue-800 text-sm">
                                                        <!-- <i class="fas fa-user mr-1 text-blue-600"></i> -->
                                                        {{ $discipline }}
                                                        <button type="button" 
                                                                wire:click.prevent="removeDiscipline('{{ $discipline }}')"
                                                                class="remove-author ml-1 text-gray-500 hover:text-gray-700 w-4 h-4 rounded-full flex items-center justify-center text-xs">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                @endforeach
                                            @endif
                                            
                                            <!-- Input field - binds to newAuthorName for searching -->
                                            <input
                                                id="authorTextInput"
                                                type="text"
                                                placeholder="Search your Discipline..."
                                                
                                                wire:model.live="newDiscipline"
                                                
                                                class="flex-1 min-w-[120px] border-none outline-none py-1.5 px-0 text-sm bg-transparent"
                                                
                                                wire:keydown.enter.prevent="addDiscipline"
                                            >
                                        </div>

                                        <!-- Dropdown Menu for Search Results -->
                                        @if($newDiscipline && count($searchResults) > 0)
                                        <div 
                                            class="w-fit mt-1 py-2 px-4 bg-white border border-gray-200 rounded-lg shadow-xl max-h-60 overflow-y-auto"
                                        >
                                            @foreach($searchResults as $result)
                                            <div 
                                                class="px-1 py-1 hover:bg-blue-50 cursor-pointer flex flex-col justify-start border-b border-gray-100"
                                                
                                                wire:click.prevent="selectDiscipline('{{ $result }}')"  
                                            >
                                                <div class="flex justify-between align-middle">

                                                    <!-- Author Name -->
                                                    <div>
                                                        <span class="font-semibold text- text-gray-800">{{ $result }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        
                                        <!-- No results found message, visible only if something has been typed but no results returned -->
                                        @elseif($newDiscipline && count($searchResults) === 0)
                                        <div 
                                            class="absolute z-10 w-fit mt-1 bg-white border border-gray-200 rounded-lg shadow-xl"
                                        >
                                            <div class="px-4 py-3 text-sm text-gray-500">
                                                No users found matching "{{ $newDiscipline }}".
                                            </div>
                                        </div>
                                        @endif
                                        <div class="text-gray-500 text-xs mt-1">Press Enter to add an author</div>
                                    </div>
                            @error('disciplines') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label for="twitter_profile" class="block text-sm font-medium text-gray-700">X (formerly Twitter) profile</label>
                        <input type="text" id="twitter_profile" wire:model.defer="twitter_profile" class="mt-1 block w-full border p-2 rounded-md shadow-sm" placeholder="Enter your profile link or username">
                        <p class="text-xs text-gray-500 mt-1">Only visible to mutual followers</p>
                        @error('twitter_profile') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                        <input type="text" id="website" wire:model.defer="website" class="mt-1 block w-full border p-2 rounded-md shadow-sm" placeholder="https://www.example.com">
                        <p class="text-xs text-gray-500 mt-1">Only visible to mutual followers</p>
                        @error('website') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
        <script>
            $(document).ready(function() {
                let selectDiscipline = [];
                
                // Add a new author
                function addDiscipline(authorName) {
                    if (!authorName) return;
                    
                    // Create a unique ID for this author
                    const disciplineName = 'author_' + Date.now();
                    
                    // Add to selected authors array
                    selectDisciplines.push({
                        id: authorId,
                        name: authorName
                    });
                    
                    // Render the author tag
                    renderAuthorTag(authorId, authorName);
                    
                    // Update the hidden input for Livewire
                    updateAuthorsInput();
                    
                    // Validate
                    validateAuthors();
                }
                
                // Update the hidden input with selected authors
                function updateAuthorsInput() {
                    const authorNames = selectDisciplines.map(discipline => discipline.name);
                    $('#selectedAuthorsInput').val(JSON.stringify(authorNames));
                }
                
                // Remove an author
                function removeDiscipline(disciplineName) {
                    // Remove from selected authors array
                    selectDiscipline = selectDisciplines.filter(discipline => discipline.id !== disciplineName);
                    
                    // Remove the tag from UI
                    $(`#author-tag-${disciplineName}`).remove();
                    
                    // Update the hidden input for Livewire
                    updateAuthorsInput();
                    
                    // Validate
                    validateAuthors();
                }
            });
        </script>