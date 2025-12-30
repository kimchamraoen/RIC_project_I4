<div class="bg-gray-200 h-full min-h-screen">
    <livewire:components.navbar-user />

    <div class="bg-white h-fit py-5 px-20 rounded-lg shadow-sm border">
                <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">
                    Q&A<br>
                    <span class="block text-sm font-normal text-gray-600">
                        Ask a technical question to get answers from experts, 
                        or start a scientific discussion with your peers.
                    </span>
                </h3>
                <hr class="my-4 border-gray-200">

                @foreach ($questions as $question)
                    <div class="px-80">
                        <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                            <div>
                                <!-- TITLE -->
                                <h3 class="text-lg font-semibold text-gray-900 leading-snug">
                                    {{ $question->question }}
                                </h3>

                                <!-- STATUS BADGE -->
                                <span class="inline-block mt-3 px-3 py-1 text-sm rounded-md bg-green-100 text-green-700">
                                    Not yet answered
                                </span>

                                <!-- ANSWER BUTTON -->
                                <div class="mt-5">
                                    <button wire:click="answer({{ $question->id }})"
                                        class="px-5 py-1 border border-blue-600 text-blue-600 rounded-full hover:bg-blue-50">
                                        Answer
                                    </button>
                                </div>

                                <!-- FOOTER -->
                                <div class="flex justify-between items-center mt-6 pt-4 border-t text-sm text-gray-500">
                                    <div class="flex items-center space-x-6">
                                        <button class="flex items-center space-x-1 hover:text-gray-700">
                                            <span>👍</span><span>Recommend</span>
                                        </button>

                                        <button class="flex items-center space-x-1 hover:text-gray-700">
                                            <span>⭐</span><span>Follow</span>
                                        </button>

                                        <button class="flex items-center space-x-1 hover:text-gray-700">
                                            <span>↗</span><span>Share</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                @endforeach
            </div>

    <livewire:components.footer />
</div>
