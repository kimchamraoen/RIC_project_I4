<div>
    <footer class="w-full bg-blue-50 py-10">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-14">
            <div class="md:col-span-1">
                <img src="/images/ric-logo.png" alt="RIC Logo" class="h-16 mb-4">
                <p class="text-gray-700 mb-4 flex items-start">
                    <span class="text-blue-600 mr-2"><i class="fas fa-university"></i></span>
                    <span class="ml-2">
                        Institute of Technology of Cambodia, Building H,<br>
                        Russian Federation Blvd., P.O. Box 86, Phnom Penh, Cambodia
                    </span>
                </p>
                <p class="text-gray-700 mb-4 flex items-start">
                    <span class="text-blue-600 mr-2"><i class="fas fa-phone"></i></span>
                    <span class="ml-2">
                        Tel: (855) 23 880 370 / 095 353 112 <br>
                        Fax: (855) 23 880 369
                    </span>
                </p>
                <p class="text-gray-700 flex items-start">
                    <span class="text-blue-600 mr-2"><i class="fas fa-envelope"></i></span>
                    <span class="ml-2">
                        <a href="https://ric.itc.edu.kh/" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="text-blue-600 hover:text-blue-800 font-medium">
                            ric.itc.edu.kh
                        </a>
                    </span>
                </p>

                <div class="mt-8 pt-4 border-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-500 hover:text-blue-600"><i class="fab fa-facebook-f text-xl"></i></a>
                        <a href="#" class="text-gray-500 hover:text-blue-600"><i class="fab fa-twitter text-xl"></i></a>
                        <a href="#" class="text-gray-500 hover:text-blue-600"><i class="fab fa-linkedin-in text-xl"></i></a>
                        <a href="#" class="text-gray-500 hover:text-blue-600"><i class="fab fa-instagram text-xl"></i></a>
                    </div>
                </div>
            </div>

            <div class="md:col-span-1 ml-20">
                <h3 class="text-xl font-semibold mb-4 text-gray-800">Contact Us</h3>
                <div id="successMessage" class="p-2 bg-green-100 text-green-700 rounded-lg mb-4 hidden
                                                 animate-fadeIn">
                    Thank you for your message! We'll get back to you soon.
                </div>

                <form id="contactForm" novalidate >
                    <div>
                        <input id="title" name="title" type="text" placeholder="Title" required minlength="2"
                               class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <div class="text-red-500 text-sm min-h-[1em]"></div>
                    </div>

                    <div>
                        <input id="name" name="name" type="text" placeholder="Name" required minlength="2"
                               class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <div class="text-red-500 text-sm mt-1 min-h-[1em]"></div>
                    </div>

                    <div>
                        <input id="email" name="email" type="email" placeholder="Email" required
                               class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <div class="text-red-500 text-sm mt-1 min-h-[1em]"></div>
                    </div>

                    <div>
                        <input id="phone" name="phone" type="tel" placeholder="Phone" required pattern="^[0-9+\-() ]{7,}$"
                               class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <div class="text-red-500 text-sm mt-1 min-h-[1em]"></div>
                    </div>

                    <div>
                        <input id="subject" name="subject" type="text" placeholder="Subject" required minlength="2"
                               class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <div class="text-red-500 text-sm mt-1 min-h-[1em]"></div>
                    </div>

                    <div>
                        <textarea id="message" name="message" placeholder="How can we help you?" required minlength="5" rows="4"
                                  class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        <div class="text-red-500 text-sm min-h-[1em]"></div>
                    </div>

                    <button type="submit" class="w-full px-5 py-2 mt-2 bg-blue-900 text-white rounded-lg hover:bg-blue-800 transition">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </footer>


    <!-- <script>
        (function () {
            const form = document.getElementById('contactForm');
            const success = document.getElementById('successMessage');

            function setError(input, message) {
                input.classList.add('border-red-500', 'ring-2', 'ring-red-200');
                input.classList.remove('border-gray-300');
                const errorEl = input.nextElementSibling;
                if (errorEl && errorEl.classList.contains('text-red-500')) {
                    errorEl.textContent = message || '';
                }
            }

            function clearError(input) {
                input.classList.remove('border-red-500', 'ring-2', 'ring-red-200');
                input.classList.add('border-gray-300');
                const errorEl = input.nextElementSibling;
                if (errorEl && errorEl.classList.contains('text-red-500')) {
                    errorEl.textContent = '';
                }
            }

            function validateField(input) {
                const value = input.value.trim();

                if (input.hasAttribute('required') && !value) {
                    setError(input, 'This field is required');
                    return false;
                }
                
                if (input.type === 'email' && value) {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(value)) {
                        setError(input, 'Please enter a valid email address');
                        return false;
                    }
                }
                
                if (input.pattern && value) {
                    const pattern = new RegExp(input.pattern);
                    if (!pattern.test(value)) {
                        setError(input, 'Please enter a valid value');
                        return false;
                    }
                }
                
                if (input.hasAttribute('minlength') && value) {
                    const min = parseInt(input.getAttribute('minlength'), 10) || 0;
                    if (value.length < min) {
                        setError(input, `Please enter at least ${min} characters`);
                        return false;
                    }
                }

                clearError(input);
                return true;
            }

            form.querySelectorAll('input, textarea').forEach(el => {
                el.addEventListener('blur', () => validateField(el));
                el.addEventListener('input', () => {
                    if (el.classList.contains('border-red-500')) validateField(el);
                });
            });

            form.addEventListener('submit', function (e) {
                let isValid = true;
                
                form.querySelectorAll('input, textarea').forEach(input => {
                    if (!validateField(input)) {
                        isValid = false;
                    }
                });
                
                e.preventDefault(); 
                
                if (!isValid) {
                    success.classList.add('hidden');
                    return;
                }

                success.classList.remove('hidden');
                setTimeout(() => { success.classList.add('hidden'); }, 5000);
                form.reset();
                form.querySelectorAll('input, textarea').forEach(clearError);
            });
        })();
    </script> -->
</div>
