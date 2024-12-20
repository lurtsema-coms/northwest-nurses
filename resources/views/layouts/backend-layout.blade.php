<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
        {{-- Apex Chart Js --}}
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        {{-- Jquery --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        {{-- Htmx --}}
        <script src="https://unpkg.com/htmx.org@1.9.12"></script>
        <!-- Include timeago.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/timeago.js/4.0.2/timeago.min.js"></script>
        <!-- Alpine Plugins -->
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/sort@3.x.x/dist/cdn.min.js"></script>
        <!-- Alpine Core -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .htmx-indicator{
                display:none;
            }
            .htmx-request .htmx-indicator{
                display:inline;
            }
            .htmx-request.htmx-indicator{
                display:inline;
            }
        </style>
    </head>
    <body class="min-h-screen font-sans antialiased text-gray-100 bg-gray-100"
        hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
    >
        <div class="flex overflow-hidden sm:overflow-visible">
            @yield('sidebar')
            {{-- Main Content --}}
            <div class="relative flex-1 pl-7 min-w-72">
                {{-- Top Bar --}}
                @yield('topbar')
                {{-- Body Content --}}
                <div class="m-auto w-full max-w-[112.5rem] text-slate-500 py-10 pr-7 md:pl-0">
                    @include('layouts.skeleton')
                    <div id="target-content" hx-history-elt>
                        @yield('main-section')
                    </div>
                </div>
            </div>
        </div>
        @include('components.custom-session-alert')
        
        <script>
            $(document).ready(function() {
                
                window.addEventListener("popstate", (event) => {
                    // Employer
                    const dashboard_url = '{{ route('employer.dashboard') }}';
                    const jobs_url = '{{ route('employer.job') }}';
                    const profile_url = '{{ route('employer.profile', auth()->user()->id) }}';
                    const manage_employee_url = '{{ route('employer.m-employee') }}';
                    const location = document.location;

                    // Admin
                    const admin_dashboard_url = '{{ route('admin.dashboard') }}';
                    const admin_accounts_url = '{{ route('admin.accounts') }}';

                    // Sidebar active links
                    if(getSecondUrlSegment(location) == getSecondUrlSegment(dashboard_url)){
                        removeBgColor();
                        $('#dashboard-link').removeClass('bg-white')
                        $('#dashboard-link').addClass('bg-slate-300')
                    }else if(getSecondUrlSegment(location) == getSecondUrlSegment(jobs_url)){
                        removeBgColor();
                        $('#jobs-link').removeClass('bg-white')
                        $('#jobs-link').addClass('bg-slate-300')
                    }else if(getSecondUrlSegment(location) == getSecondUrlSegment(manage_employee_url)){
                        removeBgColor();
                        $('#m-employee-link').removeClass('bg-white')
                        $('#m-employee-link').addClass('bg-slate-300')
                    }else if (getSecondUrlSegment(location) == getSecondUrlSegment(profile_url)){
                        removeBgColor();
                    }

                    if(getSecondUrlSegment(location) == getSecondUrlSegment(admin_dashboard_url)){
                        removeBgColor();
                        $('#dashboard-link').removeClass('bg-white')
                        $('#dashboard-link').addClass('bg-slate-300')
                    }
                });

                // Toggle Profile
                $('#profile-button').on('click', function(){
                    $('#profile-setting').toggle();
                    $('#notification-setting').hide();

                })
                //Toggle Notification
                $('#notification-button').on('click', function(){
                    $('#notification-setting').toggle();
                    $('#profile-setting').hide();

                })
                // Toggle Sidebar
                $('#menu-bar').on('click', function(){
                        $('#sidebar').toggle();
                        window.dispatchEvent(new Event('resize'));
                    })
                })

            // Sidebar active links
            function removeBgColor() {
                $('.url-links').removeClass('bg-slate-300');
                $('.url-links').addClass('bg-white');
            }

            function addBgColorLink(event){
                event.currentTarget.classList.remove('bg-white')
                event.currentTarget.classList.add('bg-slate-300')
            }

            function getSecondUrlSegment(url) {
                const parsedUrl = new URL(url, window.location.origin);
                const segments = parsedUrl.pathname.split('/');

                return segments[1] || '';
            }

            function getBaseWithSecondSegment(url) {
                // Create a URL object to parse the URL
                const parsedUrl = new URL(url, window.location.origin);
                // Split the pathname into segments
                const segments = parsedUrl.pathname.split('/').filter(segment => segment); // Remove empty segments

                // Reconstruct the URL including the origin and the first two segments
                if (segments.length >= 2) {
                    return `${parsedUrl.origin}/${segments[0]}/${segments[1]}`;
                } else if (segments.length === 1) {
                    return `${parsedUrl.origin}/${segments[0]}`;
                } else {
                    return parsedUrl.origin; // Just the base URL if no segments
                }
            }
        </script>

        @yield('script')
            <script>
                let inactivityTime = function () {
                    let time;
                    let maxInactivityTime = 1800000; // 30 minutes in milliseconds

                    // Reset the timer on user activity
                    window.onload = resetTimer;
                    document.onmousemove = resetTimer;
                    document.onkeypress = resetTimer;
                    document.onclick = resetTimer;
                    document.onscroll = resetTimer;

                    function logout() {
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = "{{ route('logout') }}";
                        // Include CSRF token for enhanced security
                        const csrfInput = document.createElement('input');
                        csrfInput.type = 'hidden';
                        csrfInput.name = '_token';
                        csrfInput.value = "{{ csrf_token() }}";
                        form.appendChild(csrfInput);

                        document.body.appendChild(form);
                        form.submit();
                    }

                    function resetTimer() {
                        clearTimeout(time);
                        time = setTimeout(logout, maxInactivityTime);
                    }
                };
                $(document).ready(function(){
                    $(document).on('click', '.change-password-modal', function(){
                        console.log('test');
                        event.preventDefault();
                        $('.change-password').show();
                    });
                    $(document).on('click', '.btn-close-password', function(){
                        $('.change-password').hide();
                    });
                    $(document).on('click', '.change-email-modal', function(){
                        event.preventDefault();
                        $('.change-email').show();
                    });
                    $(document).on('click', '.btn-close-email', function(){
                        $('.change-email').hide();
                    });

                    function logoutWithDelay() {
                        setTimeout(function(){
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = "{{ route('logout') }}";
                            // Include CSRF token for enhanced security
                            const csrfInput = document.createElement('input');
                            csrfInput.type = 'hidden';
                            csrfInput.name = '_token';
                            csrfInput.value = "{{ csrf_token() }}";
                            form.appendChild(csrfInput);

                            document.body.appendChild(form);
                            form.submit();
                        }, 2000);
                    }

                    if ("{{ session('successPassword') }}") {
                        logoutWithDelay();
                    }

                    if ("{{ session('successEmail') }}") {
                        logoutWithDelay();
                    }
                });

            inactivityTime(); // Initialize the inactivity timer
        </script>
    </body>
</html>
