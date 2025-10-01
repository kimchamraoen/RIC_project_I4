<div class="mt-5">
    <div class="border border-dotted border-gray-400 rounded-lg p-4">
        <button id="toggleButton_grant" class="flex align-items-center w-full text-left focus:outline-none">
            <div class="flex items-center justify-content-center">
                <span class="text-gray-600 mr-2 text-xl">📘</span>
                <span class="text-gray-800 font-medium">Add your grants, awards, or scholarship</span>
            </div>
        </button>

        <div id="content_grant" class="mt-4 max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
            <div class="p-4 border border-solid border-gray-200 rounded-lg">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-bold">Grant, Award or Scholarship</h2>
                    {{-- This button dispatches the unique event --}}
                    <button x-data @click="$dispatch('show-grant-modal')" class="text-blue-600 hover:text-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </button>  
                </div>   <hr class="border-gray-300 my-1">
                
                @if (is_null($grants->award_type) && is_null($grants->title) && is_null($grants->month_start_date) && is_null($grants->year_start_date) && is_null($grants->month_end_date) && is_null($grants->year_end_date) && is_null($grants->currency) && is_null($grants->amount) && is_null($grants->funding_agency) && is_null($grants->grant_reference) && is_null($grants->principal_investigators) && is_null($grants->co_investigators) && is_null($grants->institution) && is_null($grants->secondary_institutions))
                    <p class="text-gray-500 mt-2">Please fill your information</p>
                @else
                    <div class="grid grid-cols-6 mt-2 ">
                        <p class="text-black font-bold col-span-2">Award Type: </p>
                        <p class="text-gray-700 col-span-4">{{ $grants->award_type }}</p>
                    </div>
                    <div class="grid grid-cols-6 mt-2 ">
                        <p class="text-black font-bold col-span-2">Title: </p>
                        <p class="text-gray-700 col-span-4">{{ $grants->title }}</p>
                    </div>
                    <div class="grid grid-cols-6  mt-2 ">
                        <p class="text-black font-bold col-span-2">Start Date: </p>
                        <div class="flex gap-4 justyfy-start align-items-center col-span-4">
                            <p class="text-gray-700">{{$grants->month_start_date}} ,</p>
                            <p class="text-gray-700">{{$grants->year_start_date}}</p> 
                        </div>
                    </div>
                    <div class="grid grid-cols-6  mt-2 ">
                        <p class="text-black font-bold col-span-2">End Date: </p>
                        <div class="flex gap-4 justyfy-start align-items-center col-span-4">
                            <p class="text-gray-700">{{$grants->month_end_date}} ,</p>
                            <p class="text-gray-700">{{$grants->year_end_date}}</p> 
                        </div>
                    </div>
                    <div class="grid grid-cols-6 mt-2 ">
                        <p class="text-black font-bold col-span-2">Currency: </p>
                        <p class="text-gray-700 col-span-4">{{ $grants->currency }}</p>
                    </div>
                    <div class="grid grid-cols-6 mt-2 ">
                        <p class="text-black font-bold col-span-2">Amount: </p>
                        <p class="text-gray-700 col-span-4">{{ $grants->amount }}</p>
                    </div>
                    <div class="grid grid-cols-6 mt-2 ">
                        <p class="text-black font-bold col-span-2">Funding Agency: </p>
                        <p class="text-gray-700 col-span-4">{{ $grants->funding_agency }}</p>
                    </div>
                    <div class="grid grid-cols-6 mt-2 ">
                        <p class="text-black font-bold col-span-2">Grant Reference: </p>
                        <p class="text-gray-700 col-span-4">{{ $grants->grant_reference }}</p>
                    </div>
                    <div class="grid grid-cols-6 mt-2 ">
                        <p class="text-black font-bold col-span-2">Principal Investigators: </p>
                        <p class="text-gray-700 col-span-4">{{ $grants->principal_investigators }}</p>
                    </div>
                    <div class="grid grid-cols-6 mt-2 ">
                        <p class="text-black font-bold col-span-2">CO-investigators: </p>
                        <p class="text-gray-700 col-span-4">{{ $grants->co_investigators }}</p>
                    </div>
                    <div class="grid grid-cols-6 mt-2 ">
                        <p class="text-black font-bold col-span-2">Institution: </p>
                        <p class="text-gray-700 col-span-4">{{ $grants->institution }}</p>
                    </div>
                    <div class="grid grid-cols-6 mt-2 ">
                        <p class="text-black font-bold col-span-2">Secondary Institution: </p>
                        <p class="text-gray-700 col-span-4">{{ $grants->secondary_institutions }}</p>
                    </div>
                @endif
            </div>
            
        </div>
    </div>

    {{-- The Modal --}}
    <div x-data="{ show: false }"
         x-show="show"
         {{-- Listen for the unique event dispatched by the button --}}
         x-on:show-grant-modal.window="show = true"
         x-on:hide-grant-modal.window="show = false"
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
                    <h3 class="text-xl font-semibold text-gray-800">Edit grant or Award</h3>
                </div>

                <div class="p-6 space-y-6 overflow-scroll max-h-130">
                    <div class="col-span-1 md:col-span-2">
                        <label for="award_type" class="block mb-2 text-sm font-medium text-gray-700">Award Type</label>
                        <select wire:model.defer="award_type" id="award_type" class="block w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Select your type</option>
                            <option value="Grant">Grant</option>
                            <option value="Award">Award</option>
                            <option value="Scholarship">Scholarship</option>
                        </select>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-700">Title <span class="text-red-500">*</span></label>
                        <input wire:model.defer="title" type="text" id="title" placeholder="Enter a title" class="block w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-700">Start date <span class="text-red-500">*</span></label>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="month_start_date" class="block mb-2 text-sm font-medium text-gray-700">Month <span class="text-red-500">*</span></label>
                                <select wire:model.defer="month_start_date" class="block w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select</option>
                                    <option value="january">January</option>
                                    <option value="february">February</option>
                                    <option value="march">March</option>
                                    <option value="april">April</option>
                                    <option value="may">May</option>
                                    <option value="june">June</option>
                                    <option value="july">July</option>
                                    <option value="august">August</option>
                                    <option value="september">September</option>
                                    <option value="october">October</option>
                                    <option value="november">November</option>
                                    <option value="december">December</option>
                                </select>
                            </div>
                            <div>
                                <label for="year_start_date" class="block mb-2 text-sm font-medium text-gray-700">Year <span class="text-red-500">*</span></label>
                                <select wire:model.defer="year_start_date" class="block w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>  
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-700">End date <span class="text-red-500">*</span></label>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="month_end_date" class="block mb-2 text-sm font-medium text-gray-700">Month <span class="text-red-500">*</span></label>
                                <select wire:model.defer="month_end_date" class="block w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select</option>
                                    <option value="january">January</option>
                                    <option value="february">February</option>
                                    <option value="march">March</option>
                                    <option value="april">April</option>
                                    <option value="may">May</option>
                                    <option value="june">June</option>
                                    <option value="july">July</option>
                                    <option value="august">August</option>
                                    <option value="september">September</option>
                                    <option value="october">October</option>
                                    <option value="november">November</option>
                                    <option value="december">December</option>
                                </select>
                            </div>
                            <div>
                                <label for="year_end_date" class="block mb-2 text-sm font-medium text-gray-700">Year <span class="text-red-500">*</span></label>
                                <select wire:model.defer="year_end_date" class="block w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>  
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-700">Total funding</label>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="currency" class="block mb-2 text-sm font-medium text-gray-700">Currency</label>
                                <select wire:model.defer="currency" class="block w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select currency</option>
                                    <option>AEP</option>
                                    <option>AFN</option>
                                    <option>ALL</option>
                                    <option>AMD</option>
                                    <option>ANG</option>
                                    <option>AOA</option>
                                    <option>ARS</option>
                                    <option>AUD</option>
                                    <option>AWG</option>
                                </select>
                            </div>
                            <div>
                                <label for="amount" class="block mb-2 text-sm font-medium text-gray-700">Amount</label>
                                <input wire:model.defer="amount" type="text" placeholder="Enter amount" class="block w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label for="funding_agency" class="block mb-2 text-sm font-medium text-gray-700">Funding agency</label>
                        <input wire:model.defer="funding_agency" type="text" id="funding_agency" placeholder="Enter funding agency" class="block w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label for="grant_reference" class="block mb-2 text-sm font-medium text-gray-700">Grant reference</label>
                        <input wire:model.defer="grant_reference" type="text" id="grant_reference" placeholder="Enter reference" class="block w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label for="principal_investigators" class="block mb-2 text-sm font-medium text-gray-700">Principal investigators</label>
                        <input wire:model.defer="principal_investigators" type="text" id="principal_investigators" placeholder="Enter your principal investigators" class="block w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label for="co_investigators" class="block mb-2 text-sm font-medium text-gray-700">Co-investigators</label>
                        <input wire:model.defer="co_investigators" type="text" id="co_investigators" placeholder="Enter your co-investigators" class="block w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label for="institution" class="block mb-2 text-sm font-medium text-gray-700">Institution</label>
                        <input wire:model.defer="institution" type="text" id="institution" placeholder="Start typing to search" class="block w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label for="secondary_institutions" class="block mb-2 text-sm font-medium text-gray-700">Secondary institutions</label>
                        <input wire:model.defer="secondary_institutions" type="text" id="secondary_institutions" placeholder="Enter institutions" class="block w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
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
        const toggleButton = document.getElementById('toggleButton_grant');
        const content = document.getElementById('content_grant');

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