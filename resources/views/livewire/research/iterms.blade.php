<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<div>
    <div class="rounded-md mx-5 my-6">
        <livewire:user-profile.profile-info />
    </div>

    <div class="flex bg-slate-50 text-slate-800 min-h-screen font-sans p-6">
        <!-- Sidebar -->
        <!-- <div class="dashboard-wrapper flex-1 w-full"> -->
            <aside class="w-72 bg-white border-r border-slate-200 min-h-screen   overflow-y-auto shadow sticky top-0">
                <!-- Sidebar Header -->
                <div class="flex items-center mb-8 pb-4 border-b border-slate-200">
                    <i class="fas fa-book-open text-blue-600 text-2xl mr-3"></i>
                    <h2 class="text-xl font-semibold text-slate-900">Research Dashboard</h2>
                </div>

                <!-- Sidebar Menu -->
                <ul class="menu space-y-2">
                    <li class="active flex items-center px-4 py-3 rounded-lg cursor-pointer transition bg-blue-50 text-blue-600 font-semibold">
                        <i class="fas fa-list text-lg w-6 mr-3 text-center"></i>
                        Research Items
                    </li>
                    <li class="flex items-center px-4 py-3 rounded-lg cursor-pointer transition hover:bg-blue-50">
                        <i class="fas fa-file-alt text-lg w-6 mr-3 text-center"></i>
                        Article
                    </li>
                    <li class="flex items-center px-4 py-3 rounded-lg cursor-pointer transition hover:bg-slate-100">
                        <i class="fas fa-chalkboard-teacher text-lg w-6 mr-3 text-center"></i>
                        Conference Paper
                    </li>
                    <li class="flex items-center px-4 py-3 rounded-lg cursor-pointer transition hover:bg-slate-100">
                        <i class="fas fa-database text-lg w-6 mr-3 text-center"></i>
                        Data
                    </li>
                    <li class="flex items-center px-4 py-3 rounded-lg cursor-pointer transition hover:bg-slate-100">
                        <i class="fas fa-flask text-lg w-6 mr-3 text-center"></i>
                        Research
                    </li>
                    <li class="flex items-center px-4 py-3 rounded-lg cursor-pointer transition hover:bg-slate-100">
                        <i class="fas fa-desktop text-lg w-6 mr-3 text-center"></i>
                        Presentation
                    </li>
                    <li class="flex items-center px-4 py-3 rounded-lg cursor-pointer transition hover:bg-slate-100">
                        <i class="fas fa-image text-lg w-6 mr-3 text-center"></i>
                        Poster
                    </li>
                    <li class="flex items-center px-4 py-3 rounded-lg cursor-pointer transition hover:bg-slate-100">
                        <i class="fas fa-file-medical text-lg w-6 mr-3 text-center"></i>
                        Preprint
                    </li>
                    <li>
                        <a href="/question" class="flex items-center px-4 py-3 rounded-lg cursor-pointer transition hover:bg-slate-100 text-slate-700 no-underline">
                            <i class="fas fa-question-circle text-lg w-6 mr-3 text-center"></i>
                            <span>Questions</span>
                        </a>
                    </li>
                    <li class="flex items-center px-4 py-3 rounded-lg cursor-pointer transition hover:bg-slate-100">
                        <i class="fas fa-comments text-lg w-6 mr-3 text-center"></i>
                        Answer
                    </li>
                    <li class="flex items-center px-4 py-3 rounded-lg cursor-pointer transition hover:bg-slate-100">
                        <i class="fas fa-user-check text-lg w-6 mr-3 text-center"></i>
                        Confirm your authorship
                    </li>
                    <li class="flex items-center px-4 py-3 rounded-lg cursor-pointer transition hover:bg-slate-100">
                        <i class="fas fa-eye text-lg w-6 mr-3 text-center"></i>
                        Manage file visibility
                    </li>
                </ul>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-6 ">
                <div class="card border-2 border-dashed border-blue-100 p-10 text-center rounded-xl max-w-2xl mx-auto transition">
                    <img src="https://img.icons8.com/ios/100/1e40af/document--v1.png" alt="document" class="mx-auto mb-5">
                    <h3 class="text-2xl mb-4 text-slate-900 font-semibold">Add your publication</h3>
                    <p class="text-slate-500 text-base mb-6 leading-relaxed">
                        Add your publication to increase the visibility of your research. Once you've added them, your publications will be listed here.
                    </p>
                    <a href="/add"
                       class="inline-flex items-center justify-center px-6 py-3 bg-blue-900 text-white text-base font-medium rounded-lg hover:bg-blue-800 shadow-md transition">
                        <i class="fas fa-plus mr-2"></i>
                        Add a publication
                    </a>
                </div>
            </main>
        <!-- </div> -->
    </div>

    <script>
        // Sidebar active link toggle
        const menuItems = document.querySelectorAll('.menu li');
        menuItems.forEach(item => {
            item.addEventListener('click', () => {
                document.querySelector('.menu li.active')?.classList.remove('active');
                item.classList.add('active');
            });
        });

        function addPublication() {
            alert("Add publication functionality will go here.");
        }
    </script>
</div>
