<div class="relative w-100">
    {{-- Search Box --}}
    <form role="search">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke-width="1.5" 
                stroke="currentColor" 
                class="w-5 h-5 text-gray-600">
            <path stroke-linecap="round" 
                    stroke-linejoin="round" 
                    d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
            </svg>
        </span>
        <input
            wire:model.live="search"
            wire:keydown.escape="resetForm"
            wire:keydown.tab="resetForm"
            wire:keydown.arrow-up="decrementHighlight"
            wire:keydown.arrow-down="incrementHighlight"
            type="search"
            placeholder="Search..."
            class="w-full py-2 pl-10 pr-4 text-sm rounded-full border border-gray-300 
                   focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 
                   bg-white placeholder-gray-500"
        >
    </form>
    
    {{-- Dropdown --}}
    @if (isset($users) && $search != '')
        <div class="fixed top-0 bottom-0 right-0 left-0" wire:click="resetForm"></div>
        <div class="dropdown-menu d-block p-2 border border-gray-300 rounded-md 
                    bg-white shadow-lg mt-1 absolute w-full z-10">
            @forelse($users as $i => $user)
                <a href="{{ route('user-profile', $user['id']) }}" class="{{ $highlightIndex === $i ? 'highlight' : '' }} w-full text-left text-sm text-gray-700 hover:bg-gray-100" 
                       >
                    <div class="flex items-center p-2 space-x-3 hover:bg-gray-100 rounded-md">
                        <div>
                            <img src="{{ $user->profileInformation?->image 
                                        ? asset('storage/' . $user->profileInformation->image) 
                                        : asset('default-avatar.png') }}" 
                                alt="Profile" 
                                class="w-8 h-8 rounded-full">
                        </div>
                        <div>
                            <div class="font-medium text-gray-900">{{ $user->name }}</div>
                            <div class="text-sm text-gray-500">{{ $user->institution }}</div>
                        </div>
                    </div>
                </a><hr class="border-gray-200">
            @empty
                <div class="px-4 py-2 text-sm text-gray-500">No results found.</div>
            @endforelse
        </div>
    @endif
</div>
