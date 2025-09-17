<div>
    <nav class="bg-white shadow-sm flex justify-between items-center px-4 py-2">
            <div class="flex items-center space-x-3">
                <a href="#" class="flex items-center space-x-1 text-xs">
                    <img src="/images/en.png" alt="English" class="w-5 h-3 object-cover inline-block"> 
                    <span>English</span>
                </a>
                <a href="#" class="flex items-center space-x-1 text-xs">
                    <img src="/images/fr.png" alt="Français" class="w-5 h-3 object-cover inline-block"> 
                    <span>Français</span>
                </a>
                <a href="#" class="flex items-center space-x-1 text-xs">
                    <img src="/images/kh.png" alt="Khmer" class="w-5 h-3 object-cover inline-block"> 
                    <span>ភាសាខ្មែរ</span>
                </a>
            </div>

            <div class="flex items-center space-x-2">
                <a href="/login" class="px-4 py-1 border border-blue-600 rounded-lg text-blue-600 hover:bg-blue-50 text-sm">Login</a>
                <a href="/conduct" class="px-4 py-1 border bg-blue-600 rounded-lg border-blue-600 text-white hover:bg-blue-500 text-sm">Register</a>
            </div>
        </nav>

        <nav class="bg-blue-200 shadow-md">
            <div class="container mx-auto flex items-center justify-between py-3 px-4">
                <div class="flex items-center space-x-3">
                    <img src="/images/ITC-logo.png" alt="ITC Logo" class="h-12"> 
                    <img src="/images/RIC-logo.png" alt="RIC Logo" class="h-12"> 
                </div>

                <ul class="hidden md:flex space-x-10 font-medium text-blue-900 uppercase">
                    <li><a href="/" class="hover:text-blue-600">Home</a></li>
                    <li><a href="/profile" class="hover:text-blue-600">Profile</a></li>
                    <li><a href="/directory" class="hover:text-blue-600">Directory</a></li>
                    <li><a href="/research" class="hover:text-blue-600">Research Potential</a></li>
                    <li><a href="/publication" class="hover:text-blue-600">Publication</a></li>
                    <li><a href="/service" class="hover:text-blue-600">Service</a></li>
                    <li><a href="/contact" class="hover:text-blue-600">Contact Us</a></li>
                </ul>

                <div class="relative flex items-center">
                    <div id="enhancedSearch" class="flex items-center justify-end transition-all duration-300 ease-in-out">
                        <input 
                            type="text" 
                            placeholder="Search by title, author, or keyword..." 
                            class="w-0 opacity-0 p-0 border-none outline-none rounded-full bg-gray-200 text-sm transition-all duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 group-hover:w-48 group-hover:opacity-100 group-hover:px-3 group-hover:py-1">
                        <button id="enhancedSearchToggle" class="p-2 rounded-full focus:outline-none transition-all duration-300 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <div class="relative h-[350px] w-auto bg-cover bg-center" style="background-image: url('/images/cover.jpg');">
             <div class="absolute inset-0 bg-black opacity-10"></div>
             <div class="relative h-full flex items-center  text-white">
                 <div class="flex justify-start items-center">
                     <img src="/images/RIC-logo.png" alt="RIC Logo" class="h-64 mb-4"> 
                     <!-- <p class="text-white text-lg text-center max-w-3xl">
                         Welcome to our Research and Innovation Center. We are dedicated to advancing knowledge and fostering innovation through cutting-edge research and collaboration.
                     </p> -->
                 </div>
             </div>
         </div>
</div>
