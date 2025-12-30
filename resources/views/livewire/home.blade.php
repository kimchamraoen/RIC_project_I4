<div class="bg-gray-200 h-full min-h-screen">
    <livewire:components.navbar-user />

    <div class="mt-8 mb-10 flex justify-center">
        <div class="max-w-3xl w-full bg-white p-6 rounded-lg shadow-sm">
            <div class="bg-white p-6 rounded-lg shadow-sm h-fit">
                <h3 class="mb-5">Feartured Research</h3><hr class="border-gray-300 mb-5">
                @foreach ($research as $item)
                <div class="">
                    <a href="{{ route('detailPage', ['id' => $item->id]) }}" class="text-xl font-bold text-gray-900">
                        {{ $item->title }} 
                    </a>

                    <div class="flex items-center space-x-3 text-sm mb-4 mt-3">
                        <span class="inline-flex items-center px-3 py-1 bg-teal-100 text-teal-800 rounded-5 font-medium">
                            {{ $item->publication_type }}
                        </span>
                                
                        <div class="flex">
                            <span class="text-gray-600 mr-2">{{ $item->month }}</span>
                            <span class="text-gray-600">{{ $item->year }}</span>
                        </div>
                        <!-- <span class="text-gray-600">·</span> -->
                        <!-- <span class="text-gray-600">4 Reads</span> -->
                    </div>

                    <div class="flex items-center space-x-4 text-sm text-gray-500 mb-4">
                        <span class="flex items-center space-x-1">
                            <span class="flex">
                                <svg class="w-4.5 h-4.5 text-blue-400 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <a class="mr-2" href="{{ route('user-profile', $item->user->id) }}">{{$item->user->name}}</a>
                                @php
                                    $authors = $item->authorsList();
                                @endphp
                                @foreach($authors as $author)
                                   <div class="flex">
                                        <svg class="w-4.5 h-4.5 text-blue-400 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        <a class="mr-2" href="{{ route('user-profile', $author->id) }}"> {{ $author->name }}</a>
                                   </div>
                                @endforeach
                            </span>
                        </span>
                    </div>

                    <div class="flex items-end space-x-4">
                        <button type="button" wire:click="download({{ $item->id }})" class="px-5 py-1 border border-blue-600 bg-white text-blue-600 font-semibold rounded-full hover:bg-blue-600 hover:text-white transition duration-150 ease-in-out">
                            Download
                        </button>
                    </div>
                </div><hr class="bg-gray-300 my-5">
                @endforeach
            </div>
        </div>
    </div>

    <livewire:components.footer />
</div>
