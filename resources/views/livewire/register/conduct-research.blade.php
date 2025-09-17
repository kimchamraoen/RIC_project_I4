<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RIC - Registration</title>
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
        display: none;
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
  </style>
</head>
<body>
    <div>
     @livewire('register.navbar')

        <!-- Conduct Research Page -->
        <div id="conductResearchPage" class="page container mx-auto flex flex-col md:flex-row items-center justify-center gap-8 md:gap-16 p-4 active-page">
            <!-- Right side with form -->
            <div class="form-container  rounded-xl p-4 md:p-8">
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Show where you conduct research</h2>
                    <p class="text-gray-500 mt-1">Enter your Institute detail to quickly find your colleagues</p>
                </div>

                <form wire:submit.prevent="conduct" id="researchForm" class="space-y-3">
                    <!-- Institution -->
                    <div>
                        <label for="researchInstitute" class="block text-sm font-medium text-gray-700 mb-1">Institution*</label>
                        <input wire:model="institution" type="text" id="researchInstitute" class="input-field" placeholder="Enter Institute" required>
                        <div id="researchInstituteError" class="error-message">Please enter your Institution</div>
                    </div>

                <!-- Faculty -->
                    <div>
                        <label for="faculty" class="block text-sm font-medium text-gray-700 mb-1">Faculty*</label>
                        <input wire:model="faculty" type="text" id="faculty" class="input-field" placeholder="Enter your faculty" required>
                        <div id="facultyError" class="error-message">Please enter your Faculty</div>
                    </div>

                    <!-- Department -->
                    <div>
                        <label for="department" class="block text-sm font-medium text-gray-700 mb-1">Department*</label>
                        <select wire:model="department" id="department" class="input-field" required>
                            <option value="">Select your department</option>
                            <option value="gca">GCA</option>
                            <option value="gic">GIC</option>
                            <option value="gee">GEE</option>
                            <option value="gru">GRU</option>
                            <option value="ams">AMS</option>
                            <option value="gti">GTI</option>
                        </select>
                        <div id="departmentError" class="error-message">Please select a department</div>
                    </div>

                    <!-- Research Unit -->
                    <div>
                        <label for="researchUnit" class="block text-sm font-medium text-gray-700 mb-1">Research Unit*</label>
                        <input wire:model="researchUnit" type="text" id="researchUnit" class="input-field" placeholder="Enter your Research Unit" required>
                        <div id="researchUnitError" class="error-message">Please enter your Research Unit</div>
                    </div>

                    <!-- Date -->
                    <div>
                        <label for="researchDate" class="block text-sm font-medium text-gray-700 mb-1">Date*</label>
                        <input wire:model="researchDate" type="date" id="researchDate" class="input-field" required>
                        <div id="researchDateError" class="error-message">Please enter a valid Date</div>
                    </div>
                    <!-- Continue Button -->
                <div>
                    <a href="/connection" 
                    id="joinOtherResearchBtn"
                    class=" flex justify-center w-full mt-4 py-2 px-3 bg-blue-900 text-white rounded-lg hover:bg-blue-800 transition-colors">
                        Continue
                    </a>
                </div>
                </form>
            </div>
        </div>

        <div class=" flex mt-2">
            @livewire('register.footer')
        </div>
    </div>
</body>
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Ensure all input/select/textarea fields are enabled and clickable
    const fields = document.querySelectorAll("input, select, textarea");

    fields.forEach(field => {
        field.removeAttribute("disabled");
        field.style.pointerEvents = "auto";
        field.style.zIndex = "10";
    });

    // Extra safety: check if something is covering the form
    const formContainer = document.querySelector(".form-container");
    if (formContainer) {
        formContainer.style.position = "relative";
        formContainer.style.zIndex = "50";
    }

    console.log("✅ Form fields unlocked and clickable");
});
document.getElementById("joinOtherResearchBtn").addEventListener("click", function () {
    const form = document.getElementById("researchForm");
    if (form.checkValidity()) {
        window.location.href = "/connection"; // redirect
    } else {
        form.reportValidity(); // show browser validation messages
    }
});
</script>

</html>
