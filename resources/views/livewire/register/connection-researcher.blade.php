<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIC - Registration Flow</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <style>
        .form-container {
            max-width: 440px;
            width: 100%;
        }
        .input-field {
            padding: 12px 16px;
            border-radius: 8px;
            border: 1px solid #D1D5DB;
            width: 100%;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .input-field:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
            outline: none;
        }
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: #6B7280;
            font-size: 14px;
        }
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #E5E7EB;
        }
        .divider::before {
            margin-right: 16px;
        }
        .divider::after {
            margin-left: 16px;
        }
        .error-message {
            color: #EF4444;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
        }
        input, textarea, select, button {
            pointer-events: auto !important;
            position: relative;
            z-index: 10;
        }
       /* Fix the tall section that pushes the footer away */
    #connection.page,
    #connection.active-page {
    min-height: auto !important;  /* stop forcing 100vh */
    padding-bottom: 2rem;         /* keep a nice gap */
    }



    </style>
</head>
<body>
    <!-- Single root element for Livewire component -->
    <div>
        @livewire('register.navbar')
        
        <div id="connection" class="page container mx-auto flex flex-col md:flex-row items-center justify-center gap-8 md:gap-16 p-4 active-page">
            <!-- with form -->
            <div class="form-container  rounded-xl p-4 md:p-8">
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-blue-800">Join with other researcher</h2>
                </div>

                @if (session()->has('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <form class="space-y-4" wire:submit.prevent="submit">
                    <!-- Full Name -->
                    <div>
                        <label for="fullName" class="block text-sm font-medium text-gray-700 mb-1">Full Name*</label>
                        <input 
                            type="text" 
                            id="fullName" 
                            wire:model="fullName" 
                            class="input-field" 
                            placeholder="Enter your full name" 
                            autocomplete="name"
                        >
                        @error('fullName') <div class="error-message">{{ $message }}</div> @enderror
                    </div>

                    <!-- Institute Email -->
                    <div>
                       
                        <!-- <label for="instituteEmail" class="block text-sm font-medium text-gray-700">Email*</label>
                        <input wire:model="email" type="email" id="instituteEmail"
                                class="w-full mt-1 border-gray-300 rounded-lg input-focus focus:outline-none focus:ring-2 focus:ring-accent p-2 border"
                                placeholder="Enter your email" required>
                                -->
                        <label for="instituteEmail" class="block text-sm font-medium text-gray-700 mb-1">Institute Email*</label>
                        <input 
                            type="email" 
                            id="instituteEmail" 
                            wire:model="instituteEmail" 
                            class="input-field" 
                            placeholder="Enter your institute email" 
                            autocomplete="email"
                        >
                        @error('instituteEmail') <div class="error-message">{{ $message }}</div> @enderror
                    </div>
                    
                    <!-- Password -->
                    <div>
                        <label for="otherPassword" class="block text-sm font-medium text-gray-700 mb-1">Password*</label>
                        <div class="relative">
                            <input 
                                type="password" 
                                id="otherPassword" 
                                wire:model="otherPassword" 
                                class="input-field pr-10" 
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
                        @error('otherPassword') <div class="error-message">{{ $message }}</div> @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone*</label>
                        <input 
                            type="tel" 
                            id="phone" 
                            wire:model="phone" 
                            class="input-field" 
                            placeholder="Enter your phone number" 
                            inputmode="numeric" 
                            autocomplete="tel"
                        >
                        @error('phone') <div class="error-message">{{ $message }}</div> @enderror
                    </div>

                    <!-- Policy Agreement -->
                    <div class="flex items-start gap-2">
                        <input 
                            type="checkbox" 
                            id="policyagreement" 
                            wire:model="policyagreement" 
                            class="h-4 w-4 text-blue-900 border-gray-300 rounded mt-1"
                        >
                        <label for="policyagreement" class="text-sm text-gray-600">
                            I agree to <a href="#" class="text-blue-600 hover:underline">privacy policy & terms</a>
                        </label>
                    </div>
                    @error('policyagreement') <div class="error-message">{{ $message }}</div> @enderror

                    <!-- Submit -->
                    <button 
                        type="submit" 
                        class="w-full py-3 px-4 bg-blue-900 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                        Complete Registration
                    </button>
                </form>
            </div>
        </div>
        <div class="mt-4">
            @livewire('register.footer')
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("otherPassword");
            const passwordIcon = document.getElementById("passwordIcon");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordIcon.classList.remove("fa-eye");
                passwordIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                passwordIcon.classList.remove("fa-eye-slash");
                passwordIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>