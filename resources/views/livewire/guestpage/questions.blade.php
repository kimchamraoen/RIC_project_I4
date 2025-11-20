<!-- Your existing HTML section -->
<div class="mb-4">
    <h2 class="text-xl font-semibold text-gray-800 mb-3 leading-tight">
        Ruiz-Marquez, E. (2023). Measuring the Benefits of an exergame-based intervention on Executive Functions in Older Adults: A Randomized Controlled Trial
    </h2>
    
    <div class="flex items-center text-sm text-gray-500 mt-4">
        <i class="far fa-eye mr-2"></i>
        <span id="viewCount">6 Views</span>
    </div>
</div>

<!-- Action Buttons -->
<div class="flex flex-wrap gap-3 pt-4 border-t border-gray-100">
    <button id="readMoreBtn" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
        <i class="fas fa-book-open mr-2"></i>Read more
    </button>
    
    <button class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
        <i class="fas fa-share-alt mr-2"></i>Share
    </button>
    
    <button class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
        <i class="fas fa-quote-right mr-2"></i>Cite
    </button>
    
    <button class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
        <i class="far fa-bookmark mr-2"></i>Save
    </button>
</div>

<!-- Detailed Publication Content (Hidden by default) -->
<div id="publicationDetails" class="publication-details mt-6 border-t pt-6 hidden">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Study Abstract</h3>
    <p class="text-gray-700 mb-4">
        This randomized controlled trial investigated the effects of a 12-week exergame-based intervention on executive functions in older adults (65+ years). Participants (N=120) were randomly assigned to either an experimental group that engaged in exergaming sessions three times per week or a control group that maintained their usual activities.
    </p>
    
    <h4 class="font-semibold text-gray-800 mb-2">Key Findings:</h4>
    <ul class="list-disc pl-5 text-gray-700 mb-4 space-y-2">
        <li>Significant improvement in working memory (p < 0.01) in the experimental group</li>
        <li>Enhanced cognitive flexibility compared to control group (p < 0.05)</li>
        <li>Better inhibition control measured by Stroop test (p < 0.01)</li>
        <li>Positive correlation between session adherence and cognitive improvements</li>
    </ul>
    
    <h4 class="font-semibold text-gray-800 mb-2">Methodology:</h4>
    <p class="text-gray-700 mb-4">
        The study employed a comprehensive battery of neuropsychological tests including the Trail Making Test, Digit Span, and Wisconsin Card Sorting Test. Exergame sessions utilized commercially available platforms with motion tracking technology, adapted for older adult users with varying levels of technological proficiency.
    </p>
    
    <div class="bg-blue-50 p-4 rounded-lg mb-4">
        <h4 class="font-semibold text-blue-800 mb-2">Implications for Practice:</h4>
        <p class="text-blue-700">
            Exergaming presents a promising, engaging approach to cognitive maintenance in aging populations. The combination of physical activity and cognitive challenge may offer synergistic benefits for executive function preservation.
        </p>
    </div>
    
    <h4 class="font-semibold text-gray-800 mb-2">Publication Status:</h4>
    <div class="flex items-center text-sm text-gray-600 mb-2">
        <i class="fas fa-hourglass-half mr-2 text-yellow-500"></i>
        <span>Currently under review at <strong>Journal of Gerontology</strong></span>
    </div>
    <div class="flex items-center text-sm text-gray-600">
        <i class="far fa-clock mr-2 text-blue-500"></i>
        <span>Initial submission: December 2023 | First decision expected: April 2024</span>
    </div>
    
    <div class="mt-6 flex flex-wrap gap-2">
        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
            <i class="fas fa-user-friends mr-1"></i>Older Adults
        </span>
        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
            <i class="fas fa-brain mr-1"></i>Cognitive Training
        </span>
        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
            <i class="fas fa-gamepad mr-1"></i>Exergaming
        </span>
        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
            <i class="fas fa-clipboard-check mr-1"></i>RCT
        </span>
    </div>
    
    <div class="mt-6 p-4 bg-gray-50 rounded-lg">
        <h4 class="font-semibold text-gray-800 mb-2">Contact the Researcher:</h4>
        <p class="text-gray-700">
            For more information about this study or collaboration opportunities, please contact Dr. E. Ruiz-Marquez at e.ruiz-marquez@research.example.edu
        </p>
    </div>
</div>

<!-- Add this CSS -->
<style>
.publication-details {
    opacity: 0;
    max-height: 0;
    overflow: hidden;
    transition: all 0.5s ease-in-out;
}

.publication-details.open {
    opacity: 1;
    max-height: 2000px;
}

.publication-details:not(.hidden) {
    display: block;
}
</style>

<!-- Add this JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const readMoreBtn = document.getElementById('readMoreBtn');
    const publicationDetails = document.getElementById('publicationDetails');
    const viewCountElement = document.getElementById('viewCount');
    let isExpanded = false;
    let views = 6;
    
    readMoreBtn.addEventListener('click', function() {
        isExpanded = !isExpanded;
        
        if (isExpanded) {
            // Show details
            publicationDetails.classList.remove('hidden');
            // Trigger animation
            setTimeout(() => {
                publicationDetails.classList.add('open');
            }, 10);
            
            // Update button
            readMoreBtn.innerHTML = '<i class="fas fa-chevron-up mr-2"></i>Read less';
            readMoreBtn.classList.remove('bg-blue-600', 'hover:bg-blue-700');
            readMoreBtn.classList.add('bg-blue-800', 'hover:bg-blue-900');
            
            // Update view count (only first time)
            if (views === 6) {
                views++;
                viewCountElement.textContent = views + ' Views';
            }
        } else {
            // Hide details
            publicationDetails.classList.remove('open');
            // Wait for transition then hide completely
            setTimeout(() => {
                publicationDetails.classList.add('hidden');
            }, 500);
            
            // Update button
            readMoreBtn.innerHTML = '<i class="fas fa-book-open mr-2"></i>Read more';
            readMoreBtn.classList.remove('bg-blue-800', 'hover:bg-blue-900');
            readMoreBtn.classList.add('bg-blue-600', 'hover:bg-blue-700');
        }
    });
});
</script>