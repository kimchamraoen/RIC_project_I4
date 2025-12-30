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

        @if (is_null($skillModel->language) && empty($skillModel->skill))
            <p class="text-gray-500 mt-2">Please fill your information</p>
        @else
            <div class=" items-start gap-4 mt-4">
                <div class="text-gray-700 mt-2">{{ is_array($skillModel->skill) ? implode(', ', $skillModel->skill) : $skillModel->skill }}</div>
                <div class="text-gray-700 mt-2">{{ is_array($skillModel->language) ? implode(', ', $skillModel->language) : $skillModel->language }}</div>
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
                        <label for="skill" class="block text-sm font-medium text-gray-700">
                            Select Disciplines (Hold CTRL/CMD to select multiple):
                        </label>
                        <div class="relative"
                            x-data="{ skill: @entangle('skill') }"
                            @click.away="$wire.showDropdown = false">

                            {{-- Clickable select box --}}
                            <div 
                                class="flex flex-wrap items-center gap-2 py-3 border-b-2 border-gray-300 bg-transparent min-h-[46px] cursor-pointer"
                                @click="$wire.toggleDropdownSkill()"
                            >
                                {{-- Selected tags --}}
                                <template x-for="skill in skill" :key="skill">
                                    <div class="inline-flex items-center bg-blue-50 border border-blue-200 rounded-full py-1 pl-3 pr-2 text-blue-800 text-sm">
                                        <i class="fas fa-tools mr-1 text-blue-600"></i>
                                        <span x-text="skill"></span>
                                        <button type="button"
                                                @click.stop="$wire.removeSkill(skill)"
                                                class="ml-1 text-gray-500 hover:text-gray-700 w-4 h-4 flex items-center justify-center">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </template>

                                {{-- Placeholder --}}
                                <span class="text-gray-400" x-show="skill.length === 0">Select skills...</span>
                            </div>

                            {{-- Dropdown list --}}
                            @if($showDropdownSkill)
                                <div class="absolute z-10 w-full mt-1 bg-white border border-gray-200 rounded-lg shadow-xl max-h-60 overflow-y-auto">
                                    @foreach($allSkills as $skill)
                                        <div 
                                            class="px-4 py-2 hover:bg-blue-50 cursor-pointer border-b border-gray-100"
                                            wire:click="selectSkill('{{ $skill }}')">
                                            {{ $skill }}
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        @error('skill') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    {{-- language --}}
                    <div class="mb-3">
                        <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                        <div class="relative"
                            x-data="{ language: @entangle('language') }"
                            @click.away="$wire.showDropdown = false">

                            {{-- Clickable select box --}}
                            <div 
                                class="flex flex-wrap items-center gap-2 py-3 border-b-2 border-gray-300 bg-transparent min-h-[46px] cursor-pointer"
                                @click="$wire.toggleDropdown()"
                            >
                                {{-- Selected tags --}}
                                <template x-for="language in language" :key="language">
                                    <div class="inline-flex items-center bg-blue-50 border border-blue-200 rounded-full py-1 pl-3 pr-2 text-blue-800 text-sm">
                                        <i class="fas fa-tools mr-1 text-blue-600"></i>
                                        <span x-text="language"></span>
                                        <button type="button"
                                                @click.stop="$wire.removeLanguage(language)"
                                                class="ml-1 text-gray-500 hover:text-gray-700 w-4 h-4 flex items-center justify-center">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </template>

                                {{-- Placeholder --}}
                                <span class="text-gray-400" x-show="language.length === 0">Select skills...</span>
                            </div>

                            {{-- Dropdown list --}}
                            @if($showDropdown)
                                <div class="absolute z-10 w-full mt-1 bg-white border border-gray-200 rounded-lg shadow-xl max-h-60 overflow-y-auto">
                                    @foreach($allLanguages as $language)
                                        <div 
                                            class="px-4 py-2 hover:bg-blue-50 cursor-pointer border-b border-gray-100"
                                            wire:click="selectLanguage('{{ $language }}')">
                                            {{ $language }}
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        @error('language') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
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

