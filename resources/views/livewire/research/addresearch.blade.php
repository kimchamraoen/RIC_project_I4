<div class="bg-gray-200 h-auto w-full">
    <div class="rounded-md mx-5">
        <livewire:components.navbar-user />
    </div>

    <div class=" mx-50 px-4 py-4 bg-gray-00">
        <div class="flex flex-col lg:flex-row justify-center gap-6">
            <!-- Main Form Column -->
            <div class="w-full lg:w-8/12">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-5" id="mainFormPage">
                    <div class="p-8">
                        <h2 class="text-2xl font-medium mb-6 flex items-center justify-center">
                            <i class="fas fa-file-alt mr-2"></i> Your Research
                        </h2>

                        <form wire:submit.prevent="submit">
                            <!-- Publication Type -->
                                <div class="mb-7">
                                    <label for="publication_type" class="block font-medium mb-2">Publication Type</label>
                                    <select wire:model="publication_type" id="publication_type"
                                            class="w-full py-3 border-b-2 border-gray-300 bg-transparent focus:outline-none focus:border-blue-700"
                                            required>
                                        <option value="">Select your publication type</option>
                                        <option value="Journal">Journal</option>
                                        <option value="Conference">Conference</option>
                                        <option value="Thesis">Thesis</option>
                                        <option value="Report">Report</option>
                                    </select>
                                    @error('publication_type') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>

                                <!-- File Upload -->
                                <div class="mb-7">
                                    <label class="block font-medium mb-2">File (optional)</label>
                                    <input wire:model="file" type="file" id="fileInput" class="hidden">
                                    <label for="fileInput"
                                        class="file-btn w-full text-center block py-3 border-b-2 border-dashed border-blue-700 text-blue-700 cursor-pointer transition-all bg-blue-50 hover:bg-blue-100 hover:border-blue-900">
                                        <i class="fas fa-upload mr-2"></i>Select and Upload file
                                    </label>
                                    <div id="fileName" class="text-gray-500 text-sm mt-2">
                                        @if($file)
                                            {{ $file->getClientOriginalName() }}
                                        @else
                                            No file selected
                                        @endif
                                    </div>
                                    @error('file') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>

                                <!-- Title -->
                                <div class="mb-7">
                                    <label for="title" class="block font-medium mb-2">Title</label>
                                    <input type="text" id="title" wire:model="title" required
                                        class="w-full py-3 border-b-2 border-gray-300 bg-transparent focus:outline-none focus:border-blue-700"
                                        placeholder="Enter the title">
                                    @error('title') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>

                                <!-- Authors - Fixed Version -->
                                <div class="mb-7">
                                    <label class="block font-medium mb-2">Authors</label>
                                    <div class="authors-container">
                                        <div id="authorsInput" class="authors-input flex flex-wrap items-center gap-2 py-3 border-b-2 border-gray-300 bg-transparent min-h-[46px] focus-within:border-blue-700 transition-colors">
                                            <!-- Author tags will be added here by JavaScript -->
                                            <!-- Display existing authors from Livewire -->
                                            @if($authors && is_array($authors))
                                                @foreach($authors as $author)
                                                    <div class="author-tag inline-flex items-center bg-blue-50 border border-blue-200 rounded-full py-1 pl-3 pr-2 text-blue-800 text-sm">
                                                        <i class="fas fa-user mr-1 text-blue-600"></i>
                                                        {{ $author }}
                                                        <button type="button" 
                                                                wire:click="removeAuthor('{{ $author }}')"
                                                                class="remove-author ml-1 text-gray-500 hover:text-gray-700 w-4 h-4 rounded-full flex items-center justify-center text-xs">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <input
                                                id="authorTextInput"
                                                type="text"
                                                placeholder="Type author name and press Enter..."
                                                class="flex-1 min-w-[120px] border-none outline-none py-1.5 px-0 text-sm bg-transparent"
                                                wire:keydown.enter.prevent="addAuthor($event.target.value)"
                                            >
                                        </div>
                                        <div class="text-gray-500 text-xs mt-1">Press Enter to add an author</div>
                                    </div>
                                    @error('authors') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>

                                <!-- Date -->
                                <div class="mb-7">
                                    <label class="block font-medium mb-2">Date</label>
                                    <div class="grid grid-cols-3 gap-3">
                                        <div>
                                            <select id="day" placeholder="Day" wire:model="day"
                                                    class="w-full py-3 border-b-2 border-gray-300 bg-transparent focus:outline-none focus:border-blue-700">
                                                <option value="">Day</option>
                                                @for($i = 1; $i <= 31; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                            @error('day') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                                        </div>
                                        <div>
                                            <select id="month" placeholder="Month" wire:model="month"
                                                    class="w-full py-3 border-b-2 border-gray-300 bg-transparent focus:outline-none focus:border-blue-700">
                                                <option value="">Month</option>
                                                @php
                                                    $months = ['January', 'February', 'March', 'April', 'May', 'June', 
                                                            'July', 'August', 'September', 'October', 'November', 'December'];
                                                @endphp
                                                @foreach($months as $index => $month)
                                                    <option value="{{ $month }}">{{ $month }}</option>
                                                @endforeach
                                            </select>
                                            @error('month') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                                        </div>
                                        <div>
                                            <select id="year" placeholder="Year" wire:model="year"
                                                    class="w-full py-3 border-b-2 border-gray-300 bg-transparent focus:outline-none focus:border-blue-700">
                                                <option value="">Year</option>
                                                
                                                @for($i = 2010; $i <= 2030; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                            @error('year') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <button type="submit"
                                        class="btn-submit bg-blue-900 text-white w-1/2 mx-auto py-3 px-6 rounded-lg flex justify-center items-center font-semibold text-base transition-all hover:bg-blue-800 hover:shadow-lg transform hover:-translate-y-0.5">
                                    Next
                                </button>
                                
                                @if (session()->has('success'))
                                    <div class="bg-green-100 text-green-700 px-4 py-3 rounded mt-4">
                                        {{ session('success') }}
                                    </div>
                                @endif
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sidebar Column -->
            <div class="w-full lg:w-4/12">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-5">
                    <div class="p-6">
                        <!-- Custom Tailwind Carousel -->
                        <div id="guidelinesCarousel" class="relative rounded-2xl overflow-hidden min-h-[100px]">
                            <div class="carousel-item block">
                                <div class="carousel-content p-6 h-full flex flex-col justify-center items-center text-center">
                                    <div class="carousel-icon bg-blue-100 text-blue-700 text-3xl w-16 h-16 rounded-full flex items-center justify-center mb-5">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                    <h4 class="text-xl font-medium mb-2">Add your research</h4>
                                    <p class="text-gray-600">To make it discoverable and citable by researchers worldwide</p>
                                </div>
                            </div>
                            <div class="carousel-item hidden">
                                <div class="carousel-content p-6 h-full flex flex-col justify-center items-center text-center">
                                    <div class="carousel-icon bg-blue-100 text-blue-700 text-3xl w-16 h-16 rounded-full flex items-center justify-center mb-5">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <h4 class="text-xl font-medium mb-2">Conference Papers</h4>
                                    <p class="text-gray-600">Include the conference name, date, and location in your submission.</p>
                                </div>
                            </div>
                            <div class="carousel-item hidden">
                                <div class="carousel-content p-6 h-full flex flex-col justify-center items-center text-center">
                                    <div class="carousel-icon bg-blue-100 text-blue-700 text-3xl w-16 h-16 rounded-full flex items-center justify-center mb-5">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <h4 class="text-xl font-medium mb-2">Journal Articles</h4>
                                    <p class="text-gray-600">Provide the journal name, volume, and page numbers for citation.</p>
                                </div>
                            </div>

                            <!-- Indicators -->
                            <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2">
                                <button class="indicator w-3 h-3 rounded-full bg-gray-300 active"></button>
                                <button class="indicator w-3 h-3 rounded-full bg-gray-300"></button>
                                <button class="indicator w-3 h-3 rounded-full bg-gray-300"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @push('scripts')
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
        <script>
            $(document).ready(function() {
                let selectedAuthors = [];
                
                // Initialize authors functionality
                function initAuthors() {
                    // Add author when Enter or comma is pressed
                    $('#authorTextInput').on('keydown', function(e) {
                        if (e.key === 'Enter' || e.key === ',') {
                            e.preventDefault();
                            addAuthor($(this).val().trim());
                            $(this).val('');
                        }
                    });
                    
                    // Also add author when input loses focus if there's content
                    $('#authorTextInput').on('blur', function() {
                        const value = $(this).val().trim();
                        if (value) {
                            addAuthor(value);
                            $(this).val('');
                        }
                    });
                }
                
                // Add a new author
                function addAuthor(authorName) {
                    if (!authorName) return;
                    
                    // Create a unique ID for this author
                    const authorId = 'author_' + Date.now();
                    
                    // Add to selected authors array
                    selectedAuthors.push({
                        id: authorId,
                        name: authorName
                    });
                    
                    // Render the author tag
                    renderAuthorTag(authorId, authorName);
                    
                    // Update the hidden input for Livewire
                    updateAuthorsInput();
                    
                    // Validate
                    validateAuthors();
                }
                
                // Update the hidden input with selected authors
                function updateAuthorsInput() {
                    const authorNames = selectedAuthors.map(author => author.name);
                    $('#selectedAuthorsInput').val(JSON.stringify(authorNames));
                }
                
                // Render author tag
                function renderAuthorTag(authorId, authorName) {
                    const tag = $('<div>').addClass('author-tag inline-flex items-center bg-blue-50 border border-blue-200 rounded-full py-1 pl-3 pr-2 text-blue-800 text-sm').attr('id', `author-tag-${authorId}`);
                    tag.html(`
                        <i class="fas fa-user mr-1 text-blue-600"></i>
                        ${authorName}
                        <button type="button" class="remove-author ml-1 text-gray-500 hover:text-gray-700 w-4 h-4 rounded-full flex items-center justify-center text-xs" data-id="${authorId}">
                            <i class="fas fa-times"></i>
                        </button>
                    `);
                    
                    // Insert before the input
                    tag.insertBefore('#authorTextInput');
                    
                    // Add remove event
                    tag.find('.remove-author').on('click', function(e) {
                        e.stopPropagation();
                        removeAuthor(authorId);
                    });
                }
                
                // Remove an author
                function removeAuthor(authorId) {
                    // Remove from selected authors array
                    selectedAuthors = selectedAuthors.filter(author => author.id !== authorId);
                    
                    // Remove the tag from UI
                    $(`#author-tag-${authorId}`).remove();
                    
                    // Update the hidden input for Livewire
                    updateAuthorsInput();
                    
                    // Validate
                    validateAuthors();
                }
                
                // Validate authors
                function validateAuthors() {
                    if (selectedAuthors.length === 0) {
                        $('#authorsInput').addClass('border-red-600');
                        return false;
                    } else {
                        $('#authorsInput').removeClass('border-red-600');
                        return true;
                    }
                }
                
                // Initialize authors functionality
                initAuthors();
                
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
                
                // Simple carousel functionality
                let currentSlide = 0;
                const totalSlides = $('.carousel-item').length;
                
                function showSlide(index) {
                    $('.carousel-item').addClass('hidden');
                    $('.carousel-item').eq(index).removeClass('hidden');
                    
                    $('.indicator').removeClass('active');
                    $('.indicator').eq(index).addClass('active');
                }
                
                // Auto-advance carousel
                setInterval(function() {
                    currentSlide = (currentSlide + 1) % totalSlides;
                    showSlide(currentSlide);
                }, 5000);
                
                // Indicator click handler
                $('.indicator').on('click', function() {
                    const index = $(this).index();
                    currentSlide = index;
                    showSlide(currentSlide);
                });
            });
        </script>
    @endpush
</div>