<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RIC - Improved Navigation</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    .hero-section{
      position: relative;
      height: 350px;
      width: auto;
      background-image: url("/images/cover.jpg");
      /* background-image: url('https://vui.unsplash.com/resize?height=256&quality=60&type=auto&url=https%3A%2F%2Fsearched-images.s3.us-west-2.amazonaws.com%2Fcefe1c3f-5a84-4ad0-9a29-18b9c8202a06%3FX-Amz-Algorithm%3DAWS4-HMAC-SHA256%26X-Amz-Credential%3DAKIAQ4GRIA4QZE4I5HUY%252F20250903%252Fus-west-2%252Fs3%252Faws4_request%26X-Amz-Date%3D20250903T104918Z%26X-Amz-Expires%3D86400%26X-Amz-SignedHeaders%3Dhost%26X-Amz-Signature%3D3bb4a6ae89c919214d5730e25711600b37467daaa1487d876b0f319797e977be&sign=9pfpZic9_3dNLPuJoO2Ne8j-SDe7Md47gmsSnMEyDkU'); */
      background-size: cover;
      background-position: center;
      display: flex;
      flex-direction: column;

    }
    .search-transition {
      transition: all 0.3s ease-in-out;
    }
    .search-input {
      width: 0;
      opacity: 0;
      padding: 0;
      border: none;
      outline: none;
    }
    .search-expanded .search-input {
      width: 200px;
      opacity: 1;
      padding: 0.5rem 0.75rem;
      border: 1px solid #e5e7eb;
    }
    .search-container {
      display: flex;
      align-items: center;
      justify-content: flex-end;
    }
    .navbar {
      background-color: white;
    }

  </style>
</head>
<body class="bg-gray-50">
  <!-- Single wrapper div for the Livewire component -->
  <div>
    <!-- Top Navigation -->
    <nav class="navbar rounded-box shadow-base-300/20 shadow-sm flex justify-between items-center px-4 py-2">
      <!-- Left side: Languages -->
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

      <!-- Right side: Auth buttons -->
      <div class="flex items-center space-x-2">
        <!-- Auth state would be handled by your backend -->
        <div>
          <a href="/login" class="px-4 py-1 border border-blue-600 rounded-lg text-blue-600 hover:bg-blue-50 text-sm">Login</a>
          <a href="/connection" class="px-4 py-1 border bg-blue-600 rounded-lg border-blue-600 text-white hover:bg-blue-500 text-sm">Register</a>
        </div>
      </div>
    </nav>

    <!-- Main Navigation -->
    <div class=" hero-section flex bg-blue-200 ">
      <div class=" flex items-center justify-between w-px-6 py-3 bg-blue-50">
        
        <!-- Left: Logos -->
        <div class="flex items-center space-x-3">
          <img src="/images/ITC-logo.png" alt="ITC Logo" class="h-12"> 
          <img src="/images/RIC-logo.png" alt="RIC Logo" class="h-12"> 
        </div>

        <!-- Center: Navigation Links -->
        <ul class="hidden md:flex space-x-10 font-medium text-blue-900 uppercase">
          <li><a href="/" class="hover:text-blue-600">Home</a></li>
          <li><a href="/profile" class="hover:text-blue-600">Profile</a></li>
          <li><a href="/directory" class="hover:text-blue-600">Directory</a></li>
          <li><a href="/research" class="hover:text-blue-600">Research Potential</a></li>
          <li><a href="/publication" class="hover:text-blue-600">Publication</a></li>
          <li><a href="/service" class= "hover:text-blue-600">Service</a></li>
          <li><a href="/contact" class="  hover:text-blue-600">Contact Us</a></li>
        </ul>

        <!-- Enhanced Search Component -->
        <div class="relative">
          <div class="search-container">
            <div id="enhancedSearch" class="flex items-center justify-end">
              <div class="relative flex items-center">
                <input 
                  type="text" 
                  placeholder="Search by title, author, or keyword..." 
                  class="search-input rounded-full bg-gray-200 text-sm search-transition focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button id="enhancedSearchToggle" class="p-2 rounded-full focus:outline-none search-transition">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z"/>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

        <div clas=" flex items-center mb-4  ">
          <img src="/images/RIC-logo.png" alt="RIC Logo" class="h-25"> 
          <!-- <p class="text-gray-700 text-lg  text-center  max-w-3xl  ">
            Welcome to our Research and Innovation Center. We are dedicated to advancing knowledge and fostering innovation through cutting-edge research and collaboration.
          </p> -->
        </div>
      </div> 
  </div>

  <script>
    // Enhanced functionality
    const enhancedSearchToggle = document.getElementById("enhancedSearchToggle");
    const enhancedSearch = document.getElementById("enhancedSearch");
    const searchInput = document.querySelector('.search-input');

    if (enhancedSearchToggle && enhancedSearch) {
      enhancedSearchToggle.addEventListener('click', function(e) {
        e.stopPropagation(); // Prevent this click from triggering the document click listener
        enhancedSearch.classList.toggle('search-expanded');
        
        // Focus on input when expanded
        if (enhancedSearch.classList.contains('search-expanded')) {
          setTimeout(() => {
            searchInput.focus();
          }, 300);
        }
      });
      
      // Close search when clicking outside
      document.addEventListener('click', function(event) {
        if (enhancedSearch.classList.contains('search-expanded') && 
            !enhancedSearch.contains(event.target)) {
          enhancedSearch.classList.remove('search-expanded');
        }
      });

      // Prevent search from closing when clicking inside the search area
      enhancedSearch.addEventListener('click', function(e) {
        e.stopPropagation();
      });
    }
  </script>

</body>
</html>