<div class="bg-gray-100 ">
    <div>
        @auth
            <livewire:components.navbar_user />
        @else
            <livewire:components.navbarguest />
        @endauth
    </div>

    <livewire:researcher.detail.headers :research="$research"/>

    <div class="max-w-4xl mt-8 mx-auto bg-white shadow-lg rounded-lg p-6">
        <div class="border-b border-gray-300 pb-4 mb-4 text-center">
            <h1 class="text-xl font-semibold text-gray-800">Abstract and figures</h1>
        </div>

        <div class="space-y-6 px-24">
            <div>
                <p class="text-sm text-gray-700 leading-relaxed">
                   {{ $research->description }}
                </p>
            </div>
            
            <!-- <div class="flex justify-start space-x-4">
                <div class="w-1/6">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFcqXH48kjNFqrS8OaAqTCh-LK7e5JkMQOjw&s" alt="document">
                </div>
                <div class="w-1/6">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFcqXH48kjNFqrS8OaAqTCh-LK7e5JkMQOjw&s" alt="document">
                </div>
            </div> -->

            <div class="mt-8 text-end text-xs text-gray-500">
                <p>Available via license: <strong class="text-gray-700">CC BY-NC-ND 4.0</strong></p>
                <p>Content may be subject to copyright.</p>
            </div>
        </div>
    </div>

    <div class="mx-auto text-black font-bold px-72 mt-10 h-auto mb-10">
        {{-- Display error message if the PDF conversion failed --}}
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold mb-4">Research Preview</h2>

        @if($pdfUrl)
            <iframe 
                src="{{ $pdfUrl }}" 
                width="100%" 
                height="800px"
                class="border rounded-lg shadow">
            </iframe>
        @else
            <p class="text-gray-600">No PDF available.</p>
        @endif
        
        </div>
    </div>

    <livewire:components.footer />

    <!-- display pdf file like images -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
        <script>
            const url = @json($pdfUrl);

            pdfjsLib.GlobalWorkerOptions.workerSrc =
                'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';

            pdfjsLib.getDocument(url).promise.then(pdf => {
                const container = document.getElementById('pdf-preview-container');
                
                
                for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
                    pdf.getPage(pageNum).then(page => {
                        const scale = 1.5;
                        const viewport = page.getViewport({ scale });

                        // Create canvas for each page
                        const canvas = document.createElement('canvas');
                        const context = canvas.getContext('2d');
                        canvas.width = viewport.width;
                        canvas.height = viewport.height;
                        canvas.style.border = "1px solid #ccc";
                        canvas.style.marginBottom = "16px";

                        container.appendChild(canvas);

                        page.render({ canvasContext: context, viewport });
                    });
                }
            }).catch(err => {
                console.error("PDF.js rendering error:", err);
            });
        </script>
</div>
