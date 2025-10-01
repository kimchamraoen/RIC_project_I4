<div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    {{-- About Me Display Section --}}
    <div class="bg-white p-6 rounded-lg shadow-sm">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-bold mb-3">Skills</h2>
            {{-- This button dispatches the unique event --}}
            <button x-data @click="$dispatch('show-skill-modal')" class="text-blue-600 hover:text-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </button>
        </div><hr class="border-gray-300">

        @if (is_null($skills->language) && empty($skills->skill))
            <p class="text-gray-500 mt-2">Please fill your information</p>
        @else
            <div class="flex items-start gap-4 mt-4">
                <p class="text-gray-700 mt-2">{{ is_array($skills->skill) ? implode(', ', $skills->skill) : $skills->skill }}</p>,
                <p class="text-gray-700 mt-2">{{ $skills->language }}</p>
            </div>
        @endif
    </div>

    {{-- The Modal --}}
    <div x-data="{ show: false }"
         x-show="show"
         {{-- Listen for the unique event dispatched by the button --}}
         x-on:show-skill-modal.window="show = true"
         x-on:hide-skill-modal.window="show = false"
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
            
            <form wire:submit.prevent="update">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800">Edit Skill</h3>
                </div>

                <div class="p-6 space-y-6">
                    <div>
                        <label for="skill" class="block text-sm font-medium text-gray-700">Skills</label>
                        <select wire:model="skill" id="multiple-test" multiple>
                                    <option value="IT">IT</option>
                                    <option value="Graphic Design">Graphic Design</option>
                                    <option value="Software">Software</option>
                                    <option value="Web Development">Web Development</option>
                                    <option value="Data Analysis">Data Analysis</option>
                                    <option value="Cybersecurity">Cybersecurity</option>
                                    <option value="Cloud Computing">Cloud Computing</option>
                                    <option value="AI & Machine Learning">AI & Machine Learning</option>
                                    <option value="Networking">Networking</option>
                                    <option value="Database Management">Database Management</option>
                                    <option value="DevOps">DevOps</option>
                                    <option value="Mobile App Development">Mobile App Development</option>
                                    <option value="Project Management">Project Management</option>
                                    <option value="UI/UX Design">UI/UX Design</option>
                                    <option value="Digital Marketing">Digital Marketing</option>
                                    <option value="Content Creation">Content Creation</option>
                                    <option value="SEO">SEO</option>      
                        </select>
                    </div>

                    {{-- language --}}
                    <div class="mb-3">
                        <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                        <select id="language" wire:model.defer="language" class="mt-2 block w-full h-10 px-2 border rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Enter your language</option>
                            <option value="Laravel">Laravel</option>
                            <option value="Mysql">Mysql</option>
                            <option value="Graphic">Graphic</option>
                            <option value="Software">Software</option>
                        </select>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    function initSelect2() {
        // Your Select2 initialization code
        $('#multiple-test').select2({
            placeholder: "Choose options",
            closeOnSelect: false,
            width: '100%'
        });

        $('#multiple-select-field').on('change', function () {
            var data = $(this).val();
            console.log(data);
            $wire.set('disciplines', data);
            // @this.set('disciplines', data);
        });
    }

    $(document).ready(function() {
        initSelect2();

        // Listen for the custom event to reinitialize Select2
        // Make sure this listener is correctly placed
        // document.addEventListener('show-about-me-modal', function() {
        //     // Reinitialize Select2 after the modal has been shown and is in the DOM
        //     // A small delay might be necessary to ensure all elements are ready
        //     setTimeout(function() {
        //         initSelect2();
        //     }, 100); 
        // });
    });
</script>