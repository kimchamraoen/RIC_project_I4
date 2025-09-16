<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Publication Form - Tailwind CSS</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#032163',
                        primaryHover: '#2456bf',
                        primaryLight: '#eff6ff',
                        borderColor: '#d1d5db',
                        errorColor: '#dc2626'
                    }
                }
            }
        }
    </script>
    <style>
        .authors-input:focus-within {
            border-color: #2563eb;
            box-shadow: none;
        }
        
        .carousel-indicators button {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin: 0 5px;
            background-color: rgba(255, 255, 255, 0.5);
            border: none;
            transition: all 0.3s ease;
        }
        
        .carousel-indicators .active {
            background-color: white;
            transform: scale(1.3);
        }
    </style>
</head>
<body class="bg-[#f8fafc] py-5 font-sans">
    <div class="container mx-auto px-4 py-4">
        <div class="flex flex-col lg:flex-row justify-center gap-6">
            <!-- Main Form Column -->
            <div class="w-full lg:w-8/12">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-5" id="mainFormPage">
                    <div class="p-8">
                        <h2 class="text-2xl font-medium mb-6 flex items-center justify-center">
                            <i class="fas fa-file-alt mr-2"></i> Your Research
                        </h2>

                        <!-- Flash message placeholder -->
                        <div class="alert alert-success alert-dismissible fade hidden bg-green-100 text-green-700 px-4 py-3 rounded mb-4" role="alert" id="formAlert">
                            <span class="alert-message"></span>
                            <button type="button" class="btn-close absolute top-0 right-0 p-3" data-bs-dismiss="alert" aria-label="Close">&times;</button>
                        </div>

                        <form id="researchForm">
                            <!-- Publication Type -->
                            <div class="mb-7">
                                <label for="publicationType" class="block font-medium mb-2">Publication Type</label>
                                <select class="w-full py-3 border-b-2 border-gray-300 bg-transparent focus:outline-none focus:border-blue-700" id="publicationType" required>
                                    <option value="">Select your publication type</option>
                                    <option value="Journal">Journal</option>
                                    <option value="Conference">Conference</option>
                                    <option value="Thesis">Thesis</option>
                                    <option value="Report">Report</option>
                                </select>
                                <div class="text-red-600 text-sm mt-1 hidden">Please select a publication type.</div>
                            </div>

                            <!-- File Upload -->
                            <div class="mb-7">
                                <label class="block font-medium mb-2">File (optional)</label>
                                <input type="file" class="hidden" id="fileInput">
                                <label for="fileInput" class="file-btn w-full text-center block py-3 border-b-2 border-dashed border-blue-700 text-blue-700 cursor-pointer transition-all bg-blue-50 hover:bg-blue-100 hover:border-blue-900">
                                    <i class="fas fa-upload mr-2"></i>Select and Upload file
                                </label>
                                <div class="text-gray-500 text-sm mt-2" id="fileName">No file selected</div>
                            </div>

                            <!-- Title -->
                            <div class="mb-7">
                                <label for="title" class="block font-medium mb-2">Title</label>
                                <input type="text" class="w-full py-3 border-b-2 border-gray-300 bg-transparent focus:outline-none focus:border-blue-700" id="title" placeholder="Enter the title" required>
                                <div class="text-red-600 text-sm mt-1 hidden">Please provide a title.</div>
                            </div>

                            <!-- Authors - Fixed Version -->
                            <div class="mb-7">
                                <label class="block font-medium mb-2">Authors</label>
                                <div class="authors-container relative">
                                    <div class="authors-input flex flex-wrap items-center gap-2 py-3 border-b-2 border-gray-300 bg-transparent min-h-[46px]" id="authorsInput">
                                        <!-- Author tags will be added here -->
                                        <input type="text" placeholder="Select option..." id="authorSearch" class="flex-1 min-w-[120px] border-none outline-none py-1.5 px-0 text-sm bg-transparent">
                                    </div>
                                    <div class="authors-dropdown absolute top-full left-0 right-0 bg-white border border-gray-300 rounded-lg shadow-xl z-10 mt-1 max-h-48 overflow-y-auto hidden" id="authorsDropdown">
                                        <!-- Options will be populated dynamically -->
                                    </div>
                                </div>
                                <div class="text-red-600 text-sm mt-1 hidden" id="authorsError">Please provide at least one author.</div>
                            </div>

                            <!-- Date -->
                            <div class="mb-7">
                                <label class="block font-medium mb-2">Date</label>
                                <div class="grid grid-cols-3 gap-3">
                                    <div>
                                        <select class="w-full py-3 border-b-2 border-gray-300 bg-transparent focus:outline-none focus:border-blue-700 appearance-none bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgZmlsbD0iIzY0NzQ4QiIgdmlld0JveD0iMCAwIDE2IDE2Ij48cGF0aCBkPSJNOCAxMkwzIDZoMTJ6Ii8+PC9zdmc+')] bg-no-repeat bg-right" id="day" required>
                                            <option value="">Day</option>
                                            <!-- Days will be populated by JavaScript -->
                                        </select>
                                        <div class="text-red-600 text-sm mt-1 hidden">Please select a day.</div>
                                    </div>
                                    <div>
                                        <select class="w-full py-3 border-b-2 border-gray-300 bg-transparent focus:outline-none focus:border-blue-700 appearance-none bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgZmlsbD0iIzY0NzQ4QiIgdmlld0JveD0iMCAwIDE2IDE2Ij48cGF0aCBkPSJNOCAxMkwzIDZoMTJ6Ii8+PC9zdmc+')] bg-no-repeat bg-right" id="month" required>
                                            <option value="">Month</option>
                                            <!-- Months will be populated by JavaScript -->
                                        </select>
                                        <div class="text-red-600 text-sm mt-1 hidden">Please select a month.</div>
                                    </div>
                                    <div>
                                        <select class="w-full py-3 border-b-2 border-gray-300 bg-transparent focus:outline-none focus:border-blue-700 appearance-none bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgZmlsbD0iIzY0NzQ4QiIgdmlld0JveD0iMCAwIDE2IDE2Ij48cGF0aCBkPSJNOCAxMkwzIDZoMTJ6Ii8+PC9zdmc+')] bg-no-repeat bg-right" id="year" required>
                                            <option value="">Year</option>
                                            <!-- Years will be populated by JavaScript -->
                                        </select>
                                        <div class="text-red-600 text-sm mt-1 hidden">Please select a year.</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit -->
                            <button type="submit" class="btn-submit bg-blue-900 text-white w-1/2 mx-auto py-3 px-6 rounded-lg flex justify-center items-center font-semibold text-base transition-all hover:bg-primaryHover hover:shadow-lg transform hover:-translate-y-0.5">
                                Next
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Upload Page -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-5 hidden" id="uploadPage">
                    <div class="p-8">
                        <h2 class="text-2xl font-medium mb-6 flex items-center justify-center">
                            <i class="fas fa-cloud-upload-alt mr-2"></i> Upload File
                        </h2>
                        
                        <div class="upload-area border-2 border-dashed border-gray-300 rounded-lg p-8 text-center mb-6" id="uploadArea">
                            <div class="upload-icon text-5xl text-gray-400 mb-4">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <h4 class="text-xl font-medium mb-2">Drag & Drop your file here</h4>
                            <p class="upload-text text-gray-500 mb-4">Supported formats: PDF, DOC, DOCX</p>
                            <button type="button" class="btn btn-outline-primary border border-blue-700 text-blue-700 px-4 py-2 rounded hover:bg-blue-700 hover:text-white transition-colors">Select File</button>
                            <input type="file" class="hidden" id="fileUploadInput" accept=".pdf,.doc,.docx">
                        </div>
                        
                        <div class="file-preview mb-6 hidden" id="filePreview">
                            <div class="file-preview-item flex justify-between items-center p-3 border border-gray-200 rounded-lg">
                                <div class="file-info flex items-center">
                                    <div class="file-icon text-red-500 mr-3">
                                        <i class="far fa-file-pdf text-2xl"></i>
                                    </div>
                                    <div class="file-details">
                                        <div class="file-name font-medium">Research_Paper.pdf</div>
                                        <div class="file-size text-gray-500 text-sm">2.4 MB</div>
                                    </div>
                                </div>
                                <div class="file-remove text-gray-500 cursor-pointer hover:text-gray-700">
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-7">
                            <label for="description" class="block font-medium mb-2">Description</label>
                            <textarea class="w-full py-3 border-b-2 border-gray-300 bg-transparent focus:outline-none focus:border-blue-700" id="description" rows="4" placeholder="Enter description"></textarea>
                        </div>
                        
                        <div class="navigation-buttons flex justify-between">
                            <button type="button" class="btn-prev bg-gray-200 text-gray-700 px-6 py-3 rounded-lg flex items-center font-medium hover:bg-gray-300 transition-colors" id="prevBtn">
                                <i class="fas fa-arrow-left mr-2"></i> Previous
                            </button>
                            <button type="button" class="btn-submit bg-blue-900 text-white px-6 py-3 rounded-lg font-medium hover:bg-primaryHover transition-colors" id="submitBtn">
                                Submit Research
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Column -->
            <div class="w-full lg:w-4/12">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-5">
                    <div class="p-6">
                        <div class="flex justify-end mb-4">
                            <i class="far fa-times-circle text-2xl text-gray-500 cursor-pointer hover:text-gray-700"></i>
                        </div>

                        <div id="guidelinesCarousel" class="carousel slide relative rounded-2xl overflow-hidden h-full" data-bs-ride="carousel">
                            <div class="carousel-inner relative w-full overflow-hidden">
                                <div class="carousel-item active relative float-left w-full">
                                    <div class="carousel-content p-6 h-full flex flex-col justify-center items-center text-center">
                                        <div class="carousel-icon bg-blue-100 text-blue-700 text-3xl w-16 h-16 rounded-full flex items-center justify-center mb-5">
                                            <i class="fas fa-file-alt"></i>
                                        </div>
                                        <h4 class="text-xl font-medium mb-2">Add your research</h4>
                                        <p class="text-gray-600">To make it discoverable and citable by researchers worldwide</p>
                                    </div>
                                </div>
                                <div class="carousel-item relative float-left w-full">
                                    <div class="carousel-content p-6 h-full flex flex-col justify-center items-center text-center">
                                        <div class="carousel-icon bg-blue-100 text-blue-700 text-3xl w-16 h-16 rounded-full flex items-center justify-center mb-5">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <h4 class="text-xl font-medium mb-2">Conference Papers</h4>
                                        <p class="text-gray-600">Include the conference name, date, and location in your submission for better categorization.</p>
                                    </div>
                                </div>
                                <div class="carousel-item relative float-left w-full">
                                    <div class="carousel-content p-6 h-full flex flex-col justify-center items-center text-center">
                                        <div class="carousel-icon bg-blue-100 text-blue-700 text-3xl w-16 h-16 rounded-full flex items-center justify-center mb-5">
                                            <i class="fas fa-book"></i>
                                        </div>
                                        <h4 class="text-xl font-medium mb-2">Journal Articles</h4>
                                        <p class="text-gray-600">Provide the journal name, volume, issue, and page numbers for proper citation.</p>
                                    </div>
                                </div>
                                <div class="carousel-item relative float-left w-full">
                                    <div class="carousel-content p-6 h-full flex flex-col justify-center items-center text-center">
                                        <div class="carousel-icon bg-blue-100 text-blue-700 text-3xl w-16 h-16 rounded-full flex items-center justify-center mb-5">
                                            <i class="fas fa-file-contract"></i>
                                        </div>
                                        <h4 class="text-xl font-medium mb-2">Technical Reports</h4>
                                        <p class="text-gray-600">Reports should include the publishing organization and report number if available.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-indicators absolute bottom-4 left-0 right-0 flex justify-center space-x-2">
                                <button type="button" data-bs-target="#guidelinesCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#guidelinesCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#guidelinesCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#guidelinesCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Sample author data
            const authors = [
                {
                    id: "1",
                    name: "Mark",
                    username: "mark",
                    avatar: "https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png"
                },
                {
                    id: "2",
                    name: "Barry",
                    username: "eug",
                    avatar: "https://cdn.flyonui.com/fy-assets/avatar/avatar-6.png"
                },
                {
                    id: "3",
                    name: "Katii",
                    username: "francis",
                    avatar: "https://cdn.flyonui.com/fy-assets/avatar/avatar-8.png"
                },
                {
                    id: "4",
                    name: " Rogers",
                    username: "rogers",
                    avatar: "https://cdn.flyonui.com/fy-assets/avatar/avatar-3.png"
                }
            ];
            
            let selectedAuthors = [];
            
            // Initialize authors dropdown
            function initAuthorsDropdown() {
                const dropdown = $('#authorsDropdown');
                dropdown.empty();
                
                authors.forEach(author => {
                    const isSelected = selectedAuthors.some(a => a.id === author.id);
                    
                    const option = $('<div>').addClass('author-option flex items-center p-3 cursor-pointer hover:bg-gray-100 transition-colors').attr('data-id', author.id);
                    option.html(`
                        <img src="${author.avatar}" alt="${author.name}" class="w-8 h-8 rounded-full mr-3">
                        <div class="author-info flex-1">
                            <div class="author-name font-medium">${author.name}</div>
                            <div class="author-username text-gray-500 text-sm">${author.username}</div>
                        </div>
                        ${isSelected ? '<i class="fas fa-check text-blue-700 ml-2"></i>' : ''}
                    `);
                    
                    option.on('click', function() {
                        toggleAuthor(author);
                    });
                    
                    dropdown.append(option);
                });
            }
            
            // Toggle author selection
            function toggleAuthor(author) {
                const index = selectedAuthors.findIndex(a => a.id === author.id);
                
                if (index === -1) {
                    // Add author
                    selectedAuthors.push(author);
                    renderAuthorTag(author);
                } else {
                    // Remove author
                    selectedAuthors.splice(index, 1);
                    $(`#author-tag-${author.id}`).remove();
                }
                
                // Update dropdown
                initAuthorsDropdown();
                
                // Hide dropdown if all authors are selected
                if (selectedAuthors.length === authors.length) {
                    $('#authorsDropdown').addClass('hidden');
                }
                
                // Validate
                validateAuthors();
            }
            
            // Render author tag
            function renderAuthorTag(author) {
                const tag = $('<div>').addClass('author-tag inline-flex items-center bg-blue-50 border border-blue-200 rounded-full py-1 pl-3 pr-2 text-blue-800 text-sm').attr('id', `author-tag-${author.id}`);
                tag.html(`
                    <img src="${author.avatar}" alt="${author.name}" class="w-4 h-4 rounded-full mr-1">
                    ${author.name}
                    <button type="button" class="remove-author ml-1 text-gray-500 hover:text-gray-700 w-4 h-4 rounded-full flex items-center justify-center text-xs" data-id="${author.id}">
                        <i class="fas fa-times"></i>
                    </button>
                `);
                
                // Insert before the input
                tag.insertBefore('#authorSearch');
                
                // Add remove event
                tag.find('.remove-author').on('click', function(e) {
                    e.stopPropagation();
                    toggleAuthor(author);
                });
            }
            
            // Validate authors
            function validateAuthors() {
                if (selectedAuthors.length === 0) {
                    $('#authorsInput').addClass('border-red-600');
                    $('#authorsError').removeClass('hidden');
                    return false;
                } else {
                    $('#authorsInput').removeClass('border-red-600');
                    $('#authorsError').addClass('hidden');
                    return true;
                }
            }
            
            // Initialize authors functionality
            initAuthorsDropdown();
            
            // Show dropdown when input is focused
            $('#authorSearch').on('focus', function() {
                $('#authorsDropdown').removeClass('hidden');
            });
            
            // Filter authors based on search input
            $('#authorSearch').on('input', function() {
                const searchTerm = $(this).val().toLowerCase();
                
                $('.author-option').each(function() {
                    const authorName = $(this).find('.author-name').text().toLowerCase();
                    const authorUsername = $(this).find('.author-username').text().toLowerCase();
                    
                    if (authorName.includes(searchTerm) || authorUsername.includes(searchTerm)) {
                        $(this).removeClass('hidden');
                    } else {
                        $(this).addClass('hidden');
                    }
                });
            });
            
            // Close dropdown when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.authors-container').length) {
                    $('#authorsDropdown').addClass('hidden');
                }
            });
            
            // Prevent dropdown close when clicking inside dropdown
            $('#authorsDropdown').on('click', function(e) {
                e.stopPropagation();
            });
            
            // Populate day dropdown
            for (let i = 1; i <= 31; i++) {
                $('#day').append($('<option>', {
                    value: i,
                    text: i
                }));
            }
            
            // Populate month dropdown
            const months = ['January', 'February', 'March', 'April', 'May', 'June', 
                           'July', 'August', 'September', 'October', 'November', 'December'];
            months.forEach((month, index) => {
                $('#month').append($('<option>', {
                    value: index + 1,
                    text: month
                }));
            });
            
            // Populate year dropdown (last 10 years and next 5 years)
            const currentYear = new Date().getFullYear();
            for (let i = currentYear - 10; i <= currentYear + 5; i++) {
                $('#year').append($('<option>', {
                    value: i,
                    text: i
                }));
            }
            
            // File input change handler
            $('#fileInput').on('change', function() {
                if (this.files.length > 0) {
                    $('#fileName').text(this.files[0].name);
                } else {
                    $('#fileName').text('No file selected');
                }
            });
            
            // File upload label click handler
            $('.file-btn').on('click', function() {
                $('#fileInput').click();
            });
            
            // Navigation between form pages
            $('#researchForm').on('submit', function(e) {
                e.preventDefault();
                
                let isValid = true;
                
                // Validate publication type
                if (!$('#publicationType').val()) {
                    $('#publicationType').addClass('border-red-600');
                    $('#publicationType').next().removeClass('hidden');
                    isValid = false;
                } else {
                    $('#publicationType').removeClass('border-red-600');
                    $('#publicationType').next().addClass('hidden');
                }
                
                // Validate title
                if (!$('#title').val().trim()) {
                    $('#title').addClass('border-red-600');
                    $('#title').next().removeClass('hidden');
                    isValid = false;
                } else {
                    $('#title').removeClass('border-red-600');
                    $('#title').next().addClass('hidden');
                }
                
                // Validate authors
                if (!validateAuthors()) {
                    isValid = false;
                }
                
                // Validate date
                if (!$('#day').val()) {
                    $('#day').addClass('border-red-600');
                    $('#day').next().removeClass('hidden');
                    isValid = false;
                } else {
                    $('#day').removeClass('border-red-600');
                    $('#day').next().addClass('hidden');
                }
                
                if (!$('#month').val()) {
                    $('#month').addClass('border-red-600');
                    $('#month').next().removeClass('hidden');
                    isValid = false;
                } else {
                    $('#month').removeClass('border-red-600');
                    $('#month').next().addClass('hidden');
                }
                
                if (!$('#year').val()) {
                    $('#year').addClass('border-red-600');
                    $('#year').next().removeClass('hidden');
                    isValid = false;
                } else {
                    $('#year').removeClass('border-red-600');
                    $('#year').next().addClass('hidden');
                }
                
                if (isValid) {
                    // Navigate to upload page
                    $('#mainFormPage').addClass('hidden');
                    $('#uploadPage').removeClass('hidden');
                }
            });
            
            // Previous button handler
            $('#prevBtn').on('click', function() {
                $('#uploadPage').addClass('hidden');
                $('#mainFormPage').removeClass('hidden');
            });
            
            // Submit button handler
            $('#submitBtn').on('click', function() {
                // Show success message
                const alert = $('#formAlert');
                alert.find('.alert-message').text('Research submitted successfully!');
                alert.removeClass('hidden').addClass('flex');
                
                // Reset form
                $('#researchForm')[0].reset();
                $('#fileName').text('No file selected');
                
                // Clear authors
                selectedAuthors = [];
                $('.author-tag').remove();
                initAuthorsDropdown();
                
                // Navigate back to main form
                $('#uploadPage').addClass('hidden');
                $('#mainFormPage').removeClass('hidden');
                
                // Scroll to alert
                $('html, body').animate({
                    scrollTop: alert.offset().top - 100
                }, 500);
                
                // Hide alert after 5 seconds
                setTimeout(function() {
                    alert.addClass('hidden').removeClass('flex');
                }, 5000);
            });
            
            // Remove validation styles when user interacts with fields
            $('#publicationType, #title, #day, #month, #year').on('input change', function() {
                if ($(this).val()) {
                    $(this).removeClass('border-red-600');
                    $(this).next().addClass('hidden');
                }
            });
            
            // Simple carousel functionality
            let currentSlide = 0;
            const totalSlides = $('.carousel-item').length;
            
            function showSlide(index) {
                $('.carousel-item').addClass('hidden');
                $('.carousel-item').eq(index).removeClass('hidden');
                
                $('.carousel-indicators button').removeClass('active');
                $('.carousel-indicators button').eq(index).addClass('active');
            }
            
            // Auto-advance carousel
            setInterval(function() {
                currentSlide = (currentSlide + 1) % totalSlides;
                showSlide(currentSlide);
            }, 5000);
            
            // Indicator click handler
            $('.carousel-indicators button').on('click', function() {
                const index = $(this).index();
                currentSlide = index;
                showSlide(currentSlide);
            });
        });
    </script>
</body>
</html>