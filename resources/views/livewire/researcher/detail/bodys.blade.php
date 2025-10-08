<div class="bg-gray-100 ">
    <div>
        <livewire:components.navbar_user />
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
        <h2>Full Text</h2>
        <iframe 
            src="{{ asset('storage/' . $research->file_path) }}" 
            style="width:100%; height:100%; border:none;"
            title="PDF Viewer">
        </iframe>
    </div>

    <livewire:components.footer />
</div>
