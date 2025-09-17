<div>
    <livewire:components.navbar />

    <div id="login" class="flex flex-col md:flex-row items-center justify-center p-8 gap-8 md:gap-16">
            <div class="max-w-md w-full shadow-xl p-10 md:p-10 rounded-32">
                <div class="text-center">
                    <h3 class="text-2xl font-bold text-blue-800">Login to RIC</h3>
                    <p class="text-gray-500">Research and Innovation Center</p>
                </div>

                <form class="space-y-4" wire:submit.prevent="login">
                    <div>
                        <label for="userEmail" class="block text-sm font-medium text-gray-700">Email*</label>
                        <input wire:model="email" type="email" id="userEmail"
                                class="w-full mt-1 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 p-2 border"
                                placeholder="Enter your email" required>
                    </div>
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                    <div>
                        <label for="userPassword" class="block text-sm font-medium text-gray-700">Password*</label>
                        <input wire:model="password" type="password" id="userPassword"
                                class="w-full mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 p-2"
                                placeholder="" required>
                    </div>
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                    <div class="flex items-center gap-2">
                        <input type="checkbox" id="policyagreement"
                                class="h-4 w-4 text-blue-900 border-gray-300 rounded">
                        <label for="policyagreement" class="text-sm text-gray-600">
                            I agree to
                            <a href="#" class="text-blue-600 hover:underline">privacy policy & terms</a>
                        </label>
                    </div>

                    <div>
                        <button type="submit" class="w-full py-2 px-4 bg-blue-900 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            Login
                        </button>
                    </div>
                </form>

                <p class="text-sm text-gray-600 text-center mt-4">
                    Don't have an account?
                    <a href="/conduct" class="text-blue-600 hover:underline">Sign up</a>
                </p>

                <div class="flex items-center justify-center space-x-2 my-4">
                    <span class="h-px bg-gray-300 flex-1"></span>
                    <span class="text-sm text-gray-500">or</span>
                    <span class="h-px bg-gray-300 flex-1"></span>
                </div>

                <button id="googleBtn" type="button" class="w-full flex items-center justify-center gap-2 py-2 transition-colors border border-gray-300 rounded-lg hover:bg-gray-100">
                    <img src="https://cdn.flyonui.com/fy-assets/blocks/marketing-ui/brand-logo/google-icon.png"
                        alt="google icon"
                        class="w-5 h-5 object-cover">
                    Sign in with Google
                </button>
            </div>
        </div>

    <livewire:components.footer />
</div>
