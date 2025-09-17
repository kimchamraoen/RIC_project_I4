<div>
    <livewire:components.navbar />

    <div id="conductResearchPage" class="container mx-auto  flex flex-col md:flex-row items-center justify-center gap-8 md:gap-16 p-4">
            <div class="max-w-lg w-full rounded-xl shadow-xl p-4 md:p-8 my-10">
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Show where you conduct research</h2>
                    <p class="text-gray-500 mt-1">Enter your Institute detail to quickly find your colleagues</p>
                </div>

                <form wire:submit.prevent="conduct" id="researchForm" class="space-y-3">
                    <div>
                        <label for="researchInstitute" class="block text-sm font-medium text-gray-700 mb-1">Institution*</label>
                        <input wire:model="institution" type="text" id="researchInstitute" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 ease-in-out" placeholder="Enter Institute" required>
                        <div id="researchInstituteError" class="text-red-500 text-sm mt-1 hidden">Please enter your Institution</div>
                    </div>

                    <div>
                        <label for="faculty" class="block text-sm font-medium text-gray-700 mb-1">Faculty*</label>
                        <input wire:model="faculty" type="text" id="faculty" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 ease-in-out" placeholder="Enter your faculty" required>
                        <div id="facultyError" class="text-red-500 text-sm mt-1 hidden">Please enter your Faculty</div>
                    </div>

                    <div>
                        <label for="department" class="block text-sm font-medium text-gray-700 mb-1">Department*</label>
                        <select wire:model="department" id="department" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 ease-in-out" required>
                            <option value="">Select your department</option>
                            <option value="gca">GCA</option>
                            <option value="gic">GIC</option>
                            <option value="gee">GEE</option>
                            <option value="gru">GRU</option>
                            <option value="ams">AMS</option>
                            <option value="gti">GTI</option>
                        </select>
                        <div id="departmentError" class="text-red-500 text-sm mt-1 hidden">Please select a department</div>
                    </div>

                    <div>
                        <label for="researchUnit" class="block text-sm font-medium text-gray-700 mb-1">Research Unit*</label>
                        <input wire:model="researchUnit" type="text" id="researchUnit" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 ease-in-out" placeholder="Enter your Research Unit" required>
                        <div id="researchUnitError" class="text-red-500 text-sm mt-1 hidden">Please enter your Research Unit</div>
                    </div>

                    <div>
                        <label for="researchDate" class="block text-sm font-medium text-gray-700 mb-1">Date*</label>
                        <input wire:model="researchDate" type="date" id="researchDate" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 ease-in-out" required>
                        <div id="researchDateError" class="text-red-500 text-sm mt-1 hidden">Please enter a valid Date</div>
                    </div>

                    <div>
                        <a href="/register" 
                           type="submit"
                           id="joinOtherResearchBtn"
                           class="flex justify-center w-full mt-4 py-3 px-3 bg-blue-900 text-white rounded-lg hover:bg-blue-800 transition-colors">
                            Continue
                        </a>
                    </div>
                    <a href="/register" class="text-blue-500 flex justify-end">Skip</a>
                </form>
            </div>
        </div>

        <livewire:components.footer />

</div>
