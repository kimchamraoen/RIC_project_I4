<div class="mt-5">
    <div class="border border-dotted border-gray-400 rounded-lg p-4">
        <button id="toggleButton" class="flex align-items-center w-full text-left focus:outline-none">
            <div class="flex items-center justify-content-center">
                <span class="text-gray-600 mr-2 text-xl">🏛️</span>
                <span class="text-gray-800 font-medium">Add missing detail about your affiliation</span>
            </div>
        </button>

        <div id="content" class="mt-4 max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
            <div class="p-4 border border-solid border-gray-200 rounded-lg">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-bold">Missing Detail</h2>
                    {{-- This button dispatches the unique event --}}
                    <button x-data @click="$dispatch('show-missing-modal')" class="text-blue-600 hover:text-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </button>  
                </div>   <hr class="border-gray-300 my-1">
                
                @if (is_null($missings->institute) && is_null($missings->department) && is_null($missings->position) && is_null($missings->primary_affiliation_month) && is_null($missings->primary_affiliation_year) && is_null($missings->country_region) && is_null($missings->city) && is_null($missings->description))
                    <p class="text-gray-500 mt-2">Please fill your information</p>
                @else
                    <div class="grid grid-cols-6 mt-2 ">
                        <p class="text-black font-bold col-span-1">Institute: </p>
                        <p class="text-gray-700 col-span-5">{{ $missings->institute }}</p>
                    </div>
                    <div class="grid grid-cols-6  mt-2 ">
                        <p class="text-black font-bold col-span-1">Position: </p>
                        <div class="flex gap-4 justyfy-start align-items-center col-span-5">
                            <p class="text-gray-700">{{$missings->position}} .</p>
                            <p class="text-gray-700">{{$missings->department}}</p> 
                        </div>
                    </div>
                    <div class="grid grid-cols-6 mt-2">
                        <p class="text-black font-bold col-span-1">Date: </p>
                        <div class="flex gap-4 justyfy-start align-items-center col-span-5">
                            <p class="text-gray-700">{{$missings->primary_affiliation_month}} ,</p>
                            <span class="text-gray-700">{{$missings->primary_affiliation_year}}</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-6 mt-2">
                        <p class="text-black font-bold col-span-1">Location: </p>
                        <div class="flex gap-4 justyfy-start align-items-center col-span-5">
                            <p class="text-gray-700">{{$missings->country_region}} ,</p>
                            <span class="text-gray-700">{{$missings->city}}</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-6 mt-2">
                        <p class="text-black font-bold col-span-1">Description: </p>
                        <p class="text-gray-700 col-span-5">{{$missings->description}}</p>
                    </div>
                @endif
            </div>
            
        </div>
    </div>

    {{-- The Modal --}}
    <div x-data="{ show: false }"
         x-show="show"
         {{-- Listen for the unique event dispatched by the button --}}
         x-on:show-missing-modal.window="show = true"
         x-on:hide-missing-modal.window="show = false"
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
             class="relative w-full max-w-lg bg-white rounded-lg shadow-xl overflow-hidden transform transition-all duration-300">
            
            <form wire:submit.prevent="save">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800">Edit Missing Detail</h3>
                </div>

                <div class="p-6 space-y-6 overflow-scroll max-h-130">
                    <div class="mb-4">
                        <h2 class="text-xl font-bold text-gray-800">Complete your affiliation</h2>
                        <p class="text-gray-600">Finish adding details about where you currently work or study.</p>
                    </div>

                    @if (session()->has('status'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('status') }}</span>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="col-span-1 md:col-span-2">
                            <label for="institute" class="block text-sm font-medium text-gray-700">Institute *</label>
                            <input wire:model="institute" type="text" id="institute" class="mt-1 border p-2 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('institute') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="col-span-1 md:col-span-2">
                            <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                            <input wire:model="department" type="text" id="department" class="mt-1  block w-full rounded-md border p-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('department') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="col-span-1 md:col-span-1">
                            <label for="position" class="block text-sm font-medium text-gray-700">Position *</label>
                            <select wire:model="position" id="position" class="mt-1 block w-full rounded-md border p-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Select</option>
                                <option value="Student">Student</option>
                                <option value="Faculty">Faculty</option>
                                <option value="Researcher">Researcher</option>
                            </select>
                            @error('position') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="col-span-1 md:col-span-1 grid grid-cols-2 gap-4">
                            <div>
                                <label for="primary_affiliation_month" class="block text-sm font-medium text-gray-700">Month *</label>
                                <select wire:model="primary_affiliation_month" id="primary_affiliation_month" class="mt-1 block w-full rounded-md border p-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">Select</option>
                                    @foreach(range(1, 12) as $m)
                                        <option value="{{ date('F', mktime(0, 0, 0, $m, 10)) }}">{{ date('F', mktime(0, 0, 0, $m, 10)) }}</option>
                                    @endforeach
                                </select>
                                @error('primary_affiliation_month') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>
                            
                            <div>
                                <label for="primary_affiliation_year" class="block text-sm font-medium text-gray-700">Year *</label>
                                <input wire:model="primary_affiliation_year" type="number" id="primary_affiliation_year" placeholder="YYYY" class="mt-1 block w-full rounded-md border p-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                @error('primary_affiliation_year') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                        <div class="col-span-1 md:col-span-2">
                            <label for="country_region" class="block text-sm font-medium text-gray-700">Country/Region *</label>
                            <input wire:model="country_region" type="text" id="country_region" class="mt-1 block w-full rounded-md border p-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('country_region') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="col-span-1 md:col-span-2">
                            <label for="city" class="block text-sm font-medium text-gray-700">City *</label>
                            <input wire:model="city" type="text" id="city" class="mt-1 block w-full rounded-md border p-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('city') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="col-span-1 md:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700">Short description of your work</label>
                            <textarea wire:model="description" id="description" rows="3" class="mt-1 block w-full rounded-md border p-2 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                            <p class="mt-2 text-sm text-gray-500">
                                A short, one-sentence description of your current work or studies at this affiliation.
                            </p>
                            @error('description') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                
                {{-- Footer --}}
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
        const toggleButton = document.getElementById('toggleButton');
        const content = document.getElementById('content');

        toggleButton.addEventListener('click', function() {
            // Toggle the 'max-h-0' class. This is the key to the animation.
            // If max-h-0 is present, content is hidden. If not, it expands.
            content.classList.toggle('max-h-0');

            // You can also toggle an expanded state for accessibility or other styling
            const isExpanded = content.classList.contains('max-h-0');
            toggleButton.setAttribute('aria-expanded', !isExpanded);
        });
    });
</script>