<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Footer</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    .btn-primary {
      background: linear-gradient(to right, #4f46e5, #6366f1);
      transition: all 0.3s ease;
    }
    .btn-primary:hover {
      background: linear-gradient(to right, #6366f1, #818cf8);
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
    }

    .success-message { animation: fadeIn 0.5s ease-out; }
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

    .input-error {
      border-color: #e53e3e !important;
      outline: none;
      box-shadow: 0 0 0 2px rgba(229, 62, 62, 0.2);
    }
    .error-message {
      color: #e53e3e;
      font-size: 0.875rem;
      margin-top: 0.25rem;
      min-height: 1em; /* keeps layout stable */
    }
  </style>
</head>
<body>
  <div class="w-full bg-blue-50 border-t py-10">
    <div class="max-w-6xl mx-auto px-6  grid md:grid-cols-2 gap-14">

      <!-- Contact Info -->
      <div>
        <img src="/images/ric-logo.png" alt="RIC Logo" class="h-16 mb-4">
        <p class="text-gray-700 mb-4 flex items-start">
          <span class="text-blue-600"><i class="fas fa-university"></i></span>
          <span class="ml-2">
            Institute of Technology of Cambodia, Building H,<br>
            Russian Federation Blvd., P.O. Box 86, Phnom Penh, Cambodia
          </span>
        </p>
        <p class="text-gray-700 mb-4 flex items-start">
          <span class="text-blue-600"><i class="fas fa-phone"></i></span>
          <span class="ml-2">
            Tel: (855) 23 880 370 / 095 353 112 <br>
            Fax: (855) 23 880 369
          </span>
        </p>
        <p class="text-gray-700 flex items-start">
          <span class="text-blue-600"><i class="fas fa-envelope"></i></span>
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

      <!-- Contact Form -->
      <div class="ml-20">
        <h3 class="text-xl font-semibold mb-4 text-gray-800">Contact Us</h3>
        <div id="successMessage" class="p-2 bg-green-100 text-green-700 rounded-lg mb-4 success-message hidden">
          Thank you for your message! We'll get back to you soon.
        </div>

        <form id="contactForm" novalidate class="space-y-1 ">
          <input id="title" name="title" type="text" placeholder="Title" required minlength="2"
                class="w-80 p-2 border  rounded-lg   ">
          <!-- <div class="error-message"></div> -->

          <input id="name" name="name" type="text" placeholder="Name" required minlength="2"
                class="w-80 p-2 border  rounded-lg ">
          <!-- <div class="error-message"></div> -->

          <input id="email" name="email" type="email" placeholder="Email" required
                class="w-80 p-2 border  rounded-lg  ">
          <!-- <div class="error-message"></div> -->

          <input id="phone" name="phone" type="tel" placeholder="Phone" required pattern="^[0-9+\-() ]{7,}$"
                class="w-80 p-2 border  rounded-lg  ">
          <!-- <div class="error-message"></div> -->

          <input id="subject" name="subject" type="text" placeholder="Subject" required minlength="2"
                class="w-80 p-2 border  rounded-lg  ">
          <!-- <div class="error-message"></div> -->

          <textarea id="message" name="message" placeholder="How can we help you?" required minlength="5" rows="4"
                    class="w-80 p-2 border  rounded-lg "></textarea>
          <!-- <div class="error-message"></div> -->

          <button type="submit" class="px-5 py-2 mt-2 bg-blue-900 text-white rounded-lg hover:bg-blue-800 transition">
            Submit
          </button>
        </form>
      </div>
    </div>
</div>

    <script>
        (function () {
            const form = document.getElementById('contactForm');
            const success = document.getElementById('successMessage');

            // helper: set error text for the field's sibling .error-message
            function setError(input, message) {
                input.classList.add('input-error');
                const errorEl = input.nextElementSibling;
                if (errorEl && errorEl.classList.contains('error-message')) {
                errorEl.textContent = message || '';
                }
            }

            function clearError(input) {
                input.classList.remove('input-error');
                const errorEl = input.nextElementSibling;
                if (errorEl && errorEl.classList.contains('error-message')) {
                errorEl.textContent = '';
                }
            }

            function validateField(input) {
                const value = input.value.trim();

                // Required check
                if (input.hasAttribute('required') && !value) {
                setError(input, 'This field is required');
                return false;
                }

                // Type-specific checks
                if (input.type === 'email' && value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(value)) {
                    setError(input, 'Please enter a valid email address');
                    return false;
                }
                }

                // Pattern check (e.g., phone)
                if (input.pattern && value) {
                const pattern = new RegExp(input.pattern);
                if (!pattern.test(value)) {
                    setError(input, 'Please enter a valid value');
                    return false;
                }
                }

                // Minlength (if provided)
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

            // Validate on blur for nicer UX
            form.querySelectorAll('input, textarea').forEach(el => {
                el.addEventListener('blur', () => validateField(el));
                el.addEventListener('input', () => {
                // clear error as user types if it becomes valid
                if (el.classList.contains('input-error')) validateField(el);
                });
            });

            form.addEventListener('submit', function (e) {
                let isValid = true;

                // Clear all previous errors and re-validate everything
                form.querySelectorAll('input, textarea').forEach(input => {
                if (!validateField(input)) isValid = false;
                });

                if (!isValid) {
                e.preventDefault();
                success.style.display = 'none';
                return;
                }

                // If this is just a frontend demo, show a fake success and prevent real submit:
                e.preventDefault(); // remove this line if you want the form to actually submit to a server
                success.style.display = 'block';
                setTimeout(() => { success.style.display = 'none'; }, 5000);
                form.reset();
                // Also clear any lingering visual errors
                form.querySelectorAll('input, textarea').forEach(clearError);
            });
        })();
    </script>
</body>
</html>
