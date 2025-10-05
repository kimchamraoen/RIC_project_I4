<div>
    <livewire:components.navbar />

    <div class="container mx-auto flex flex-col md:flex-row items-center justify-center gap-8 md:gap-16 p-4">
        <div class="max-w-md w-full rounded-xl shadow-xl my-10 p-4 md:p-8">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-blue-800">Join with other researcher</h2>
            </div>

            @if (session()->has('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            {{-- ✅ FORM STARTS HERE --}}
            <form class="space-y-4" wire:submit.prevent="submit">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name*</label>
                    <input 
                        type="text" 
                        id="name" 
                        wire:model="name" 
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 ease-in-out" 
                        placeholder="Enter your full name" 
                        autocomplete="name"
                    >
                    @error('name') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Institute Email*</label>
                    <input 
                        type="email" 
                        id="email" 
                        wire:model="email" 
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 ease-in-out" 
                        placeholder="Enter your email" 
                        autocomplete="email"
                    >
                    @error('email') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password*</label>
                    <div class="relative">
                        <input 
                            type="password" 
                            id="password" 
                            wire:model="password" 
                            class="w-full p-3 border border-gray-300 rounded-lg pr-10 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 ease-in-out" 
                            placeholder="Create a password"
                        >
                        <button 
                            type="button" 
                            onclick="togglePassword()" 
                            class="absolute inset-y-0 right-3 flex items-center text-gray-500"
                        >
                            <i id="passwordIcon" class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                    @error('password') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone*</label>
                    <input 
                        type="text" 
                        id="phone" 
                        wire:model="phone" 
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 ease-in-out" 
                        placeholder="Enter your phone number" 
                    >
                    @error('phone') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <button 
                    type="submit" 
                    class="w-full py-3 px-4 bg-blue-900 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                    Complete Registration
                </button>
            </form>
            {{-- ✅ FORM ENDS HERE --}}
        </div>
    </div>

    <livewire:components.footer />
</div>
