<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        {{-- Apex Chart Js --}}
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .css-o2c9dn {
                height: 1px;
                width: 100%;
                background: linear-gradient(90deg, rgba(224, 225, 226, 0) 0%, rgb(211, 211, 211) 49.52%, rgba(224, 225, 226, 0) 100%);
            }
        </style>
    </head>
    <body class="min-h-screen bg-gray-100 font-sans text-gray-100 antialiased">
        <div class="flex">
            {{-- Sidebar --}}
            <div class="min-h-screen w-72">
                <div class="w-full h-16 flex relative" id="logo">
                    <p class="m-auto text-slate-600 text-md font-bold">Northwest Nurses</p>
                    <div class="css-o2c9dn absolute bottom-0"></div>
                </div>
                <div class="py-10 px-7" id="sidebar-links">
                    <div class="space-y-3">
                        <div class="flex items-center w-full border shadow-sm py-2 px-3 rounded-xl text-slate-500 bg-white space-x-2 text-sm">
                            <div class="p-1 rounded-lg bg-cyan-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                                </svg>
                            </div>
                            <span class="font-medium">Dashboard</span>
                        </div>
                        <div class="flex items-center w-full border shadow-sm py-2 px-3 rounded-xl text-slate-500 bg-white space-x-2 text-sm">
                            <div class="p-1 rounded-lg bg-cyan-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                </svg>
                            </div>
                            <span class="font-medium">Jobs</span>
                        </div>
                        <div class="flex items-center w-full border shadow-sm py-2 px-3 rounded-xl text-slate-500 bg-white space-x-2 text-sm">
                            <div class="p-1 rounded-lg bg-cyan-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                                </svg>
                            </div>
                            <span class="font-medium">Employers</span>
                        </div>
                        <div class="flex items-center w-full border shadow-sm py-2 px-3 rounded-xl text-slate-500 bg-white space-x-2 text-sm">
                            <div class="p-1 rounded-lg bg-cyan-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                                </svg>
                            </div>
                            <span class="font-medium">Users</span>
                        </div>
                    </div>
                    <div class="bg-slate-600 rounded-sm px-3 py-5 mt-10">
                            <div class="mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                </svg>
                            </div>
                            <p class="font-medium text-sm">Need help?</p>
                            <p class="text-xs">Please check our documentation</p>
                            <a class="block w-full mt-5" href="http://facebook.com">
                                <div class="bg-white w-full text-center text-sm text-slate-700 font-bold rounded-2xl py-2">
                                    Documentation
                                </div>
                            </a>

                        </div>
                </div>
            </div>
            {{-- Main Content --}}
            <div class="flex-1">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-slate-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <p class="text-xl text-slate-500 ml-10">Dashboard</p>
                    </div>
                    {{-- Profile Button --}}
                    <div class="flex">
                        <div class="bg-white rounded-md px-3 py-2 shadow-sm mr-3 relative">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-slate-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            
                            <div class="flex flex-col absolute w-48 top-12 right-0 bg-white text-slate-500 shadow-md">
                                <a class="px-5 py-1 hover:bg-red-300">Profile</a>
                                <a class="px-5 py-1 hover:bg-green-300">Logout</a>
                            </div>
                        </div>
                        <div class="bg-white rounded-md px-3 py-2 shadow-sm mr-7">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-slate-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                            </svg>
                        </div>
                    </div>
                </div>
                {{-- Body Content --}}
                <div class="w-full max-w-[112.5rem] text-slate-500 py-10 pr-7">
                    <div class="gap-2 w-full max-w-[56.25rem] space-y-3">
                        <div class="flex flex-wrap gap-3">
                            <div class="flex justify-between items-center bg-white px-10 py-5 shadow-sm rounded-2xl" style="flex: 1 0 300px;">
                                <div>
                                    <p class="font-medium">Total Job Posts</p>
                                    <p class="text-xl">10</p>
                                </div>
                                <div class="bg-white rounded-md px-3 py-2 shadow-md mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex justify-between items-center bg-white px-10 py-5 shadow-sm rounded-2xl" style="flex: 1 0 300px;">
                                <div>
                                    <p class="font-medium">Active Posts</p>
                                    <p class="text-xl">120</p>
                                </div>
                                <div class="bg-white rounded-md px-3 py-2 shadow-md mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-yellow-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-3">
                            <div class="flex justify-between items-center bg-white px-10 py-5 shadow-sm rounded-2xl" style="flex: 1 0 300px;">
                                <div>
                                    <p class="font-medium">Expired Job Posts</p>
                                    <p class="text-xl">530</p>
                                </div>
                                <div class="bg-white rounded-md px-3 py-2 shadow-md mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-blue-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex justify-between items-center bg-white px-10 py-5 shadow-sm rounded-2xl" style="flex: 1 0 300px;">
                                <div>
                                    <p class="font-medium">Applications this month</p>
                                    <p class="text-xl">133</p>
                                </div>
                                <div class="bg-white rounded-md px-3 py-2 shadow-md mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-green-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="bg-white p-10 rounded-3xl shadow-sm">
                        <div id="chart">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var options = {
                series: [{
                name: 'Sales',
                data: [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13, 9, 17, 2, 7, 5]
            }],
                chart: {
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

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        </script>
    </body>
</html>
