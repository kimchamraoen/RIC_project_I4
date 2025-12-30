<div class="mt-5">
    <div class="border border-dotted border-gray-400 rounded-lg p-4">
        <button id="toggleButton_education" class="flex align-items-center w-full text-left focus:outline-none">
            <div class="flex items-center justify-content-center">
                <span class="text-gray-600 mr-2 text-xl">🎓</span>
                <span class="text-gray-800 font-medium">Add your education history</span>
            </div>
        </button>

        <div id="content_education" class="mt-4 max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
            <div class="p-4 border border-solid border-gray-200 rounded-lg">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-bold">Education History</h2>
                    {{-- This button dispatches the unique event --}}
                    <button x-data @click="$dispatch('show-education-modal')" class="text-blue-600 hover:text-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </button>  
                </div>   <hr class="border-gray-300 my-1">
                
                @if (is_null($educations->institution) && is_null($educations->degree) && is_null($educations->start_month) && is_null($educations->start_year) && is_null($educations->end_month) && is_null($educations->end_year) && is_null($educations->field_of_study) && is_null($educations->country_region) && is_null($educations->city))
                    <p class="text-gray-500 mt-2">Please fill your information</p>
                @else
                    <div class="grid grid-cols-6 mt-2 ">
                        <p class="text-black font-bold col-span-1">Institute: </p>
                        <p class="text-gray-700 col-span-5">{{ $educations->institution }}</p>
                    </div>
                    <div class="grid grid-cols-6  mt-2 ">
                        <p class="text-black font-bold col-span-1">Start Date: </p>
                        <div class="flex gap-4 justyfy-start align-items-center col-span-5">
                            <p class="text-gray-700">{{$educations->start_month}} ,</p>
                            <p class="text-gray-700">{{$educations->start_year}}</p> 
                        </div>
                    </div>
                    <div class="grid grid-cols-6 mt-2">
                        <p class="text-black font-bold col-span-1">End Date: </p>
                        <div class="flex gap-4 justyfy-start align-items-center col-span-5">
                            <p class="text-gray-700">{{$educations->end_month}} ,</p>
                            <span class="text-gray-700">{{$educations->end_year}}</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-6 mt-2">
                        <p class="text-black font-bold col-span-1">Position: </p>
                        <div class="flex gap-4 justyfy-start align-items-center col-span-5">
                            <p class="text-gray-700">{{$educations->field_of_study}} ,</p>
                            <span class="text-gray-700">{{$educations->degree}}</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-6 mt-2">
                        <p class="text-black font-bold col-span-1">Location: </p>
                        <div class="flex gap-4 justyfy-start align-items-center col-span-5">
                            <p class="text-gray-700">{{$educations->city}} ,</p>
                            <span class="text-gray-700">{{$educations->country_region}}</span>
                        </div>
                    </div>
                @endif
            </div>
            
        </div>
    </div>

    {{-- The Modal --}}
    <div x-data="{ show: false }"
         x-show="show"
         {{-- Listen for the unique event dispatched by the button --}}
         x-on:show-education-modal.window="show = true"
         x-on:hide-education-modal.window="show = false"
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
            
            <form wire:submit.prevent="update">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800">Edit Education History</h3>
                </div>

                <div class="p-6 space-y-6">
                    {{-- Institution --}}
                    <div>
                        <label for="institution" class="block text-sm font-medium text-gray-700">Institution *</label>
                        <input wire:model.defer="institution" type="text" id="institution" name="institution" placeholder="Enter your institution" 
                               class="mt-1 block w-full rounded-md border p-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    {{-- Checkbox --}}
                    <div class="flex items-center">
                        <input id="current_student" name="current_student" type="checkbox" class="h-4 w-4 text-blue-600 rounded border p-2 focus:ring-blue-500">
                        <label for="current_student" class="ml-2 block text-sm text-gray-900">I currently study here</label>
                    </div>

                    {{-- Start and End Dates --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Start date</label>
                            <div class="mt-1 grid grid-cols-2 gap-4">
                                <select wire:model.defer="start_month" class="block w-full rounded-md border p-2 shadow-sm">
                                    <option value="">Month *</option>
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                                <select wire:model.defer="start_year" class="block w-full rounded-md border p-2 shadow-sm">
                                    <option value="">Year *</option>
                                    <option>2010</option>
                                    <option>2011</option>
                                    <option>2012</option>
                                    <option>2013</option>
                                    <option>2014</option>
                                    <option>2015</option>
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                    <option>2019</option>
                                    <option>2020</option>
                                    <option>2021</option>   
                                    <option>2022</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                    <option>2026</option>
                                    <option>2027</option>
                                    <option>2028</option>
                                    <option>2029</option>
                                    <option>2030</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">End date</label>
                            <div class="mt-1 grid grid-cols-2 gap-4">
                                <select wire:model.defer="end_month" class="block w-full rounded-md border p-2 shadow-sm">
                                    <option value="">Month *</option>
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                                <select wire:model.defer="end_year" class="block w-full rounded-md border p-2 shadow-sm">
                                    <option value="">Year *</option>
                                    <option>2010</option>
                                    <option>2011</option>
                                    <option>2012</option>
                                    <option>2013</option>
                                    <option>2014</option>
                                    <option>2015</option>
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                    <option>2019</option>
                                    <option>2020</option>
                                    <option>2021</option>   
                                    <option>2022</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                    <option>2026</option>
                                    <option>2027</option>
                                    <option>2028</option>
                                    <option>2029</option>
                                    <option>2030</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Field of Study and Degree --}}
                    <div>
                        <label for="field_of_study" class="block text-sm font-medium text-gray-700">Field of study</label>
                        <input wire:model.defer="field_of_study" type="text" id="field_of_study" name="field_of_study" placeholder="Enter your field" 
                               class="mt-1 block w-full rounded-md border p-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="degree" class="block text-sm font-medium text-gray-700">Degree</label>
                        <div class="relative">
                            <select id="degree" wire:model.defer="degree" class="mt-2 block w-full h-10 px-2 border rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Enter your degree</option>
                                <option value="Bachelor of IT">Bachelor of IT</option>
                                <option value="Bachelor of Computer Science">Bachelor of Computer Science</option>
                                <option value="Bachelor of Engineering">Bachelor of Engineering</option>
                                <option value="Bachelor of Science">Bachelor of Science</option>
                                <option value="Bachelor of Technology">Bachelor of Technology</option>
                                <option value="Master of IT">Master of IT</option>
                                <option value="Master of Computer Science">Master of Computer Science</option>
                                <option value="Master of Engineering">Master of Engineering</option>
                                <option value="Master of Science">Master of Science</option>
                                <option value="Master of Technology">Master of Technology</option>
                                <option value="PhD in IT">PhD in IT</option>
                                <option value="PhD in Computer Science">PhD in Computer Science</option>
                                <option value="PhD in Engineering">PhD in Engineering</option>
                                <option value="PhD in Science">PhD in Science</option>
                                <option value="PhD in Technology">PhD in Technology</option>
                            </select>
                        </div>
                    </div>

                    {{-- Location --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="country_region" class="block text-sm font-medium text-gray-700">Country/Region</label>
                            <input wire:model.defer="country_region" type="text" id="country_region" name="country_region" placeholder="Enter your country" 
                                    class="mt-1 block w-full rounded-md border p-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input wire:model.defer="city" type="text" id="city" name="city" placeholder="Enter your city" 
                                    class="mt-1 block w-full rounded-md border p-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">
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
        const toggleButton = document.getElementById('toggleButton_education');
        const content = document.getElementById('content_education');

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