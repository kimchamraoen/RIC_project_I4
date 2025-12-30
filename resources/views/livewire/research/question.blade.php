<div>
    <div class="bg-white h-fit p-6 rounded-lg shadow-sm border mb-5 mx-auto">
                <h2 class="text-xl font-semibold text-gray-800">Question</h2>

                <p class="text-gray-600 mt-3">
                    Ask questions in Q&A to get help from experts in your field.
                    Your questions will be collected here.
                </p>

                <button
                    wire:click="createQuestion"
                    class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                    Ask a question
                </button>
            </div>
    
            <div class="bg-white h-fit p-6 rounded-lg shadow-sm border">
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Questions</h3><hr class="my-4 border-gray-200">
                @forelse($questions as $question)
                    <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-ml font-semibold text-gray-800">{{ $question->question }}</span>
                                <!-- <span class="text-sm text-gray-500">{{ $question->created_at->diffForHumans() }}</span> -->
                            </div>
                            @if($question->file_path)
                                <div class="mt-2">
                                    <a href="{{ asset('storage/' . $question->file_path) }}" target="_blank" class="text-blue-600 hover:underline">View Attached Journal</a>
                                </div>
                            @endif
                        </div>
                        <div>
                            <!-- button edit -->
                            <button wire:click='editQuestion({{ $question->id }})' class="p-2 text-blue-600">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 640 640">
                                    <path d="M505 122.9L517.1 135C526.5 144.4 526.5 159.6 517.1 168.9L488 198.1L441.9 152L471 122.9C480.4 113.5 495.6 113.5 504.9 122.9zM273.8 320.2L408 185.9L454.1 232L319.8 366.2C316.9 369.1 313.3 371.2 309.4 372.3L250.9 389L267.6 330.5C268.7 326.6 270.8 323 273.7 320.1zM437.1 89L239.8 286.2C231.1 294.9 224.8 305.6 221.5 317.3L192.9 417.3C190.5 425.7 192.8 434.7 199 440.9C205.2 447.1 214.2 449.4 222.6 447L322.6 418.4C334.4 415 345.1 408.7 353.7 400.1L551 202.9C579.1 174.8 579.1 129.2 551 101.1L538.9 89C510.8 60.9 465.2 60.9 437.1 89zM152 128C103.4 128 64 167.4 64 216L64 488C64 536.6 103.4 576 152 576L424 576C472.6 576 512 536.6 512 488L512 376C512 362.7 501.3 352 488 352C474.7 352 464 362.7 464 376L464 488C464 510.1 446.1 528 424 528L152 528C129.9 528 112 510.1 112 488L112 216C112 193.9 129.9 176 152 176L264 176C277.3 176 288 165.3 288 152C288 138.7 277.3 128 264 128L152 128z"/>
                                </svg>
                            </button>

                            <!-- button delete -->
                            <button wire:click='deleteQuestion({{ $question->id }})' class="p-2 text-red-600">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 640 640">
                                    <path d="M232.7 69.9L224 96L128 96C110.3 96 96 110.3 96 128C96 145.7 110.3 160 128 160L512 160C529.7 160 544 145.7 544 128C544 110.3 529.7 96 512 96L416 96L407.3 69.9C402.9 56.8 390.7 48 376.9 48L263.1 48C249.3 48 237.1 56.8 232.7 69.9zM512 208L128 208L149.1 531.1C150.7 556.4 171.7 576 197 576L443 576C468.3 576 489.3 556.4 490.9 531.1L512 208z"/>
                                </svg>
                            </button>
                        </div>
                    </div>  
                @empty
                    <p class="text-gray-600">No questions have been asked yet.</p>
                @endforelse  
            </div>

    <!-- modal -->
    <div x-data="{ show: false }"
        x-show="show"
        x-on:show-editor-role-modal.window="show = true"
        x-on:hide-editor-role-modal.window="show = false"
        x-on:keydown.escape.window="show = false"
        class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">
        
        <div x-show="show"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-500/60"></div>

        <div @click.away="show = false"
            x-show="show"
            x-transition
            class="relative w-full max-w-lg bg-white rounded-lg shadow-xl overflow-hidden">
            
            <form wire:submit.prevent="save">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800">Question</h3>
                </div>

                <div class="p-6 space-y-6">
                    <h2 class="text-lg font-bold text-gray-800">Ask a Question</h2>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Question</label>
                        <input wire:model.defer="question" type="text" placeholder="Enter your question"
                            class="block w-full rounded-md border p-2 shadow-sm mt-1">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Journal</label>
                        <input wire:model.defer="file" type="file" placeholder="Enter your journal"
                            class="block w-full rounded-md border p-2 shadow-sm mt-1">
                    </div>
                </div>

                <div class="px-6 py-4 flex justify-end space-x-3 border-t border-gray-200">
                    <button type="button" @click="show = false"
                        class="px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">
                        Cancel
                    </button>

                    <button type="submit" @click="show = false"
                        class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
