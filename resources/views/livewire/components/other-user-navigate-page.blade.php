<div>
    <div class="flex items-center justify-between px-7 py-3">
                    <nav class="flex gap-7">
                        <a href="{{ route('user-profile', ['user' => $user->id]) }}"
                            class="py-2 border-b-2 {{ request()->routeIs('user-profile') ? 'text-blue-600 border-blue-600' : 'text-gray-600 border-transparent hover:text-blue-600 hover:border-blue-600' }}">
                            Profile
                        </a>

                        <a href="{{ route('user-research', ['user' => $user->id]) }}"
                            class="py-2 border-b-2 {{ request()->routeIs('user-research') ? 'text-blue-600 border-blue-600' : 'text-gray-600 border-transparent hover:text-blue-600 hover:border-blue-600' }}">
                            Research
                        </a>

                        <a href="{{ route('user-stat', ['user' => $user->id]) }}"
                            class="py-2 border-b-2 {{ request()->routeIs('user-stat') ? 'text-blue-600 border-blue-600' : 'text-gray-600 border-transparent hover:text-blue-600 hover:border-blue-600' }}">
                            State
                        </a>

                        <a href="{{ route('user-follower', ['user' => $user->id]) }}"
                            class="py-2 border-b-2 {{ request()->routeIs('user-follower') ? 'text-blue-600 border-blue-600' : 'text-gray-600 border-transparent hover:text-blue-600 hover:border-blue-600' }}">
                            Following
                        </a>  
                    </nav>
                    
                </div>
</div>

<script>
    function setActive(el) {
        document.querySelectorAll('.tab-link').forEach(link => {
            link.classList.remove('text-blue-600', 'border-blue-600');
            link.classList.add('text-gray-600', 'border-transparent');
        });

        el.classList.add('text-blue-600', 'border-blue-600');
        el.classList.remove('text-gray-600', 'border-transparent');
    }

    // add click event to all links
    document.querySelectorAll('.tab-link').forEach(link => {
        link.addEventListener('click', function (e) {
            // prevent jump for demo (remove this if you want normal link navigation)
            // e.preventDefault();
            setActive(this);
        });
    });

    // set default active (Profile)
    document.addEventListener('DOMContentLoaded', () => {
        const first = document.querySelector('.tab-link');
        if (first) setActive(first);
    });
</script>