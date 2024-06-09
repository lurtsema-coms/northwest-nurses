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
        {{-- Apex Chart Js --}}
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        {{-- Jquery --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        {{-- Htmx --}}
        <script src="https://unpkg.com/htmx.org@1.9.12"></script>
        <!-- Include timeago.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/timeago.js/4.0.2/timeago.min.js"></script>
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
    <body class="min-h-screen bg-gray-100 font-sans text-gray-100 antialiased">
        <div class="flex overflow-hidden sm:overflow-visible">
            @yield('sidebar')
            {{-- Main Content --}}
            <div class="flex-1 pl-7 min-w-72">
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
                    const dashboard_url = '{{ route('employer.dashboard') }}';
                    const jobs_url = '{{ route('employer.job') }}';
                    const location = document.location;
                    
                    // Sidebar active links
                    if(getSecondUrlSegment(location) == getSecondUrlSegment(dashboard_url)){
                        removeBgColor();
                        $('#dashboard-link').removeClass('bg-white')
                        $('#dashboard-link').addClass('bg-slate-300')
                    }else if(getSecondUrlSegment(location) == getSecondUrlSegment(jobs_url)){
                        removeBgColor();
                        $('#jobs-link').removeClass('bg-white')
                        $('#jobs-link').addClass('bg-slate-300')
                    }

                    if(location == dashboard_url){
                        $('#module-section-title').text('Dashboard')
                    }else if(location == jobs_url){
                        $('#module-section-title').text('Jobs')

                    }

                });

                // Toggle Profile
                $('#profile-button').on('click', function(){
                    $('#profile-setting').toggle();
                })
                // Toggle Sidebar
                $('#menu-bar').on('click', function(){
                    $('#sidebar').toggle();
                    window.dispatchEvent(new Event('resize'));
                })
            })

            // Dashboard
            let chart;
            htmx.onLoad(function (target) {
                let options = {
                        series: [{
                        name: 'Sales',
                        data: Array.from({ length: 18 }, () => Math.floor(Math.random() * 100) + 1),
                    }],
                        chart: {
                        redrawOnWindowResize: true,
                        height: 350,
                        type: 'line',
                        toolbar: {
                            show: false,
                        }
                    },
                        forecastDataPoints: {
                        count: 7
                    },
                    stroke: {
                        width: 5,
                        curve: 'smooth'
                    },
                    xaxis: {
                        type: 'datetime',
                        categories: ['1/11/2000', '2/11/2000', '3/11/2000', '4/11/2000', '5/11/2000', '6/11/2000', '7/11/2000', '8/11/2000', '9/11/2000', '10/11/2000', '11/11/2000', '12/11/2000', '1/11/2001', '2/11/2001', '3/11/2001','4/11/2001' ,'5/11/2001' ,'6/11/2001'],
                        tickAmount: 10,
                        labels: {
                            formatter: function(value, timestamp, opts) {
                            return opts.dateFormatter(new Date(timestamp), 'dd MMM')
                            }
                        }
                    },
                    title: {
                        text: 'Employment Success',
                        align: 'left',
                        style: {
                            fontSize: "16px",
                            color: '#666'
                        }
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'dark',
                            gradientToColors: [ '#FDD835'],
                            shadeIntensity: 1,
                            type: 'horizontal',
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 100, 100, 100]
                        },
                        }
                    };

                    if (chart) {
                        chart.destroy();
                        chart = undefined;
                    }

                    if (document.querySelector("#chart")) {
                        chart = new ApexCharts(document.querySelector("#chart"), options);
                        chart.render();
                    }

            });

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
    </body>
</html>
