<div class="max-w-2xl mx-auto mt-10 bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-medium mb-6 flex items-center justify-center">
        <i class="fas fa-file-alt mr-2"></i> Research Details
    </h2>

    <form wire:submit.prevent="submit" class="space-y-6">
        <!-- Description -->
        <div>
            <label for="description" class="block font-medium mb-2">Description</label>
            <textarea id="description" wire:model="description"
                class="w-full border rounded-md p-3 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                rows="4" placeholder="Enter description"></textarea>
            @error('description') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- File Upload -->
        <div>
            <label class="block font-medium mb-2">File (optional)</label>
            <input wire:model="file" type="file" id="fileInput" class="hidden">
            <label for="fileInput"
                class="w-full block text-center py-3 border border-blue-500 text-blue-500 rounded-full cursor-pointer transition-all hover:bg-blue-50">
                Select and Upload file
            </label>
            <div class="text-gray-500 text-sm mt-2">
                @if ($file)
                    {{ $file->getClientOriginalName() }}
                @else
                    No file selected
                @endif
            </div>
            @error('file') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Submit -->
        <div class="flex justify-end">
            <button href="/iterms" type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded-full font-semibold hover:bg-blue-700 transition">
                Upload
            </button>
        </div>

        @if (session()->has('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mt-4">
                {{ session('success') }}
            </div>
        @endif
    </form>
</div>
