<div class="flex items-center justify-center mb-2">
    <div class="bg-white rounded-lg border p-4 w-200 shadow-md hover:shadow-lg transition-all duration-300">
        <div class="flex items-center mb-3">
            {{-- Public-facing image --}}
            <div class="flex-shrink-0">
                <img 
                    src="{{ asset('storage/' . ($author->profileInformation->image ?? 'default.png')) }}" 
                    class="h-16 w-16 rounded-full object-cover" 
                    alt="Profile Image"
                >
            </div>

            <div class="pl-6">
                <h3 class="text-xl font-semibold">{{ $author->name }}</h3>

                <b class="text-sm text-gray-800">Institution</b>
                <p class="text-gray-600">{{ $author->affiliation->institution ?? 'No institution' }}</p>

                <b class="text-sm text-gray-800">Department</b>
                <p class="text-gray-600">{{ $author->affiliation->department ?? 'No department available' }}</p>

                <b class="text-sm text-gray-800">Degree</b>
                <p class="text-gray-600">{{ $author->affiliation->degree ?? 'No major available' }}</p>
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('user-profile', ['user' => $author->id]) }}"
                class="inline-block bg-blue-500 text-white py-1 px-2 rounded hover:bg-blue-600">
                View Profile
            </a>
        </div>
    </div>
</div>
