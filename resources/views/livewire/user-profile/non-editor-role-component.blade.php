<div class="mt-5">
    <div class="border border-dotted border-gray-400 rounded-lg p-4">
        <button id="toggleButton_non_edit_role" class="flex items-center w-full text-left focus:outline-none">
            <div class="flex items-center justify-center">
                <span class="text-gray-600 mr-2 text-xl">💼</span>
                <span class="text-gray-700 text-base">Add your non editor role</span>
            </div>
        </button>

        <div id="content_non_edit_role" class="mt-4 max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
            <div class="p-4 border border-solid border-gray-200 rounded-lg">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-bold">Non Editor Role</h2>
                    <button x-data @click="$dispatch('show-non-editor-role-modal')" class="text-blue-600 hover:text-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </button>
                </div>
                <hr class="border-gray-300 my-1">
                
                @if (is_null($nonEditorRoles->role) && is_null($nonEditorRoles->journal))
                    <p class="text-gray-500 mt-2">Please fill your information</p>
                @else
                    <div class="grid grid-cols-6 mt-2 ">
                        <p class="text-black font-bold col-span-1">Role: </p>
                        <p class="text-gray-700 col-span-5">{{ $nonEditorRoles->role }}</p>
                    </div>
                    <div class="grid grid-cols-6 mt-2 ">
                        <p class="text-black font-bold col-span-1">Journal: </p>
                        <p class="text-gray-700 col-span-5">{{ $nonEditorRoles->journal }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- The Modal --}}
    <div x-data="{ show: false }"
        x-show="show"
        x-on:show-non-editor-role-modal.window="show = true"
        x-on:hide-non-editor-role-modal.window="show = false"
        x-on:keydown.escape.window="show = false"
        class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">
        <div x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-500/60"></div>
            
        <div @click.away="show = false"
            x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="relative w-full max-w-lg bg-white rounded-lg shadow-xl overflow-hidden transform transition-all duration-300">
            <form wire:submit.prevent="save">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800">Editor role</h3>
                </div>
                <div class="p-6 space-y-6">
                    <h2 class="text-xl font-bold text-gray-800">Add an Editor Role</h2>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Role</label>
                        <div class="mt-1">
                            <select wire:model.defer="role" class="block w-full rounded-md border p-2 shadow-sm">
                                <option value="">Role</option>
                                <option>Research Editor</option>
                                <option>Staff Editor</option>
                                <option>Senior Editor</option>
                                <option>Editoral Office</option>
                                <option>Publishing Editor</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Journal</label>
                        <input wire:model.defer="journal" type="text" id="journal" name="journal" placeholder="Enter your journal" 
                               class="mt-1 block w-full rounded-md border p-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButtons = document.getElementById('toggleButton_non_edit_role');
        const content_introduction = document.getElementById('content_non_edit_role');

        toggleButtons.addEventListener('click', function() {
            // Toggle the 'max-h-0' class. This is the key to the animation.
            // If max-h-0 is present, content is hidden. If not, it expands.
            content_introduction.classList.toggle('max-h-0');

            // You can also toggle an expanded state for accessibility or other styling
            const isExpanded = content_introduction.classList.contains('max-h-0');
            toggleButtons.setAttribute('aria-expanded', !isExpanded);
        });
    });
</script>