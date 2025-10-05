<div class="bg-gray-200 h-full min-h-screen">
    <div>
        <livewire:components.navbar_user />
    </div>

    {{-- Profile Info Section --}}
    <div class="bg-white shadow-sm rounded-md mx-5 mb-6 mt-1">
        <livewire:user-profile.profile-info />
    </div>

    <div class="flex justify-center mb-8">
        <div class="w-full max-w-4xl p-16 bg-white border border-gray-200 rounded-lg shadow-sm text-center">
            <!-- Main Content Area -->
            <div class="py-12 px-4">
                
                <!-- Headline -->
                <p class="text-xl font-semibold text-gray-700 mb-2">
                    Nothing here yet
                </p>
                
                <!-- Supporting Text -->
                <p class="text-base text-gray-500">
                    Looks like you haven't followed anyone yet.
                </p>

            </div>
        </div>
    </div>

    <livewire:components.footer />

</div>
