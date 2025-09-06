<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RIC - Improved Navigation</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="https://accounts.google.com/gsi/client" async defer></script>
        <style>
            .form-container {
                max-width: 440px;
                width: 100%;
            }
            .page {
                display: none;
            }
            .active-page {
                display: flex;
            }
            @media (max-width: 768px) {
            .container {
                    padding: 20px;
                }
            }
            #login {
                position: relative;
                z-index: 10;
            }
        </style>
    </head>
    <body>
        <div>
            @livewire('register.navbar')

                <!-- Card Container -->
                <div id="login" class="page container mx-auto flex flex-col md:flex-row items-center justify-center gap-8 md:gap-16 p-8 active-page">
                    <!-- Form Section -->
                    <div class=" form-container rounded-xl  p-10 md:p-10 border">
                        <!-- Title -->
                        <div class="text-center">
                            <h3 class="text-2xl font-bold text-blue-800">Login to RIC</h3>
                            <p class="text-gray-500">Research and Innovation Center</p>
                        </div>

                        <!-- Form -->
                        <form class="space-y-4" wire:submit.prevent="login">
                            <!-- Email -->
                            <div>
                                <label for="userEmail" class="block text-sm font-medium text-gray-700">Email*</label>
                                <input wire:model="email" type="email" id="userEmail"
                                        class=" w-full mt-1 border-gray-300 rounded-lg input-focus focus:outline-none focus:ring-2 focus:ring-accent p-2 border"                                 
                                        placeholder="Enter your email" required>
                            </div>
                            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                            <!-- Password -->
                            <div>
                                <label for="userPassword" class="block text-sm font-medium text-gray-700">Password*</label>
                                <input   wire:model="password" type="password" id="userPassword"
                                        class="w-full mt-1 border border-gray-300  rounded-lg input-focus focus:outline-none focus:ring-2 focus:ring-accent p-2"
                                        placeholder="" required>
                            </div>
                            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror


                            <!-- Policy Agreement -->
                            <div class="flex items-center gap-2">
                                <input type="checkbox" id="policyagreement"
                                        class="h-4 w-4 text-blue-900 border-gray-300 rounded">
                                <label for="policyagreement" class="text-sm text-gray-600">
                                    I agree to 
                                    <a href="#" class="text-blue-600 hover:underline">privacy policy & terms</a>
                                </label>
                            </div>
                            <!-- Submit -->
                            <div>
                                <a href="/conduct"
                                    type="submit" 
                                    class=" flex justify-center w-full py-2 px-4 bg-blue-900 text-white rounded-lg hover:bg-blue-700 transition-colors"> Login
                                </a>
                            </div>
                        </form>

                        <!-- Login Redirect -->
                        <p class="text-sm text-gray-600 text-center">
                            Already have an account?
                            <a href="/login" class="text-blue-600 hover:underline">Sign in instead</a>
                        </p>

                        <!-- Divider -->
                        <div class="flex items-center justify-center space-x-2">
                            <span class="h-px bg-gray-300 w-1/3"></span>
                            <span class="text-sm text-gray-500">or</span>
                            <span class="h-px bg-gray-300 w-1/3"></span>
                        </div>

                        <!-- Google Sign In button -->
                        <button id="googleBtn" 
                                type="button" 
                                class="w-full flex items-center justify-center gap-2 py-2   transition-colors">
                            <img src="https://cdn.flyonui.com/fy-assets/blocks/marketing-ui/brand-logo/google-icon.png"
                                alt="google icon"
                                class="w-5 h-5 object-cover">
                            Sign in with Google
                        </button>
                    </div>
                </div>
                <div class="mt-8">
                    @livewire('register.footer')
                </div>
                
        </div>

        <script>
            const clientId = "YOUR_GOOGLE_CLIENT_ID.apps.googleusercontent.com";

            // Initialize Google Identity Services once on load
            window.onload = function () {
                google.accounts.id.initialize({
                    client_id: clientId,
                    callback: handleCredentialResponse
                });

                // OPTIONAL: Render a styled Google button inside your existing button
                google.accounts.id.renderButton(
                    document.getElementById("googleBtn"),
                    { theme: "outline", size: "large" } // style options
                );
            };

            // Handle response
            function handleCredentialResponse(response) {
                const data = parseJwt(response.credential);
                alert("Signed in as: " + data.email);
                console.log(data);
            }

            function parseJwt(token) {
                let base64Url = token.split('.')[1];
                let base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
                let jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
                    return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
                }).join(''));
                return JSON.parse(jsonPayload);
            }
        </script>
    </body>
</html>