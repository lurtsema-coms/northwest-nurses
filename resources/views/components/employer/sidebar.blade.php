<div class="hidden min-h-dvh w-72 shrink-0 md:block" id="sidebar">
    <div class="w-full h-16 flex relative">
        <p class="m-auto text-slate-600 text-md font-bold" id="logo">Northwest Nurses</p>
        <div class="css-o2c9dn absolute bottom-0"></div>
    </div>
    <div class="py-10 pl-7" id="sidebar-links">
        <div class="space-y-3">
            <div class="flex items-center w-full border shadow-sm py-2 px-3 rounded-xl text-slate-500 space-x-2 text-sm cursor-pointer hover:bg-slate-300 url-links {{ Route::is('employer.dashboard') ? 'bg-slate-300' : 'bg-white'  }}" id="dashboard-link" hx-boost="true" TESTf="{{ Request::segment(1) }}"
                hx-trigger="click" hx-get="{{ route('employer.dashboard') }}" hx-target="#target-content" hx-push-url="true" hx-on:click="removeBgColor(); addBgColorLink(event); $('#target-content').hide()" hx-on:click="removeBgColor(); addBgColorLink(event); $('#target-content').hide()" hx-on::after-request="$('#target-content').show()" hx-indicator="#htmx-indicator"
                >
                <div class="p-1 rounded-lg bg-cyan-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                    </svg>
                </div>
                <span class="font-medium">Dashboard</span>
            </div>
            <div class="flex items-center w-full border shadow-sm py-2 px-3 rounded-xl text-slate-500 space-x-2 text-sm cursor-pointer hover:bg-slate-300 url-links {{ Route::is('employer.job') ? 'bg-slate-300' : 'bg-white'  }}" id="job-link" 
                    hx-get="{{ route('employer.job') }}" hx-target="#target-content" hx-push-url="true" hx-on:click="removeBgColor(); addBgColorLink(event); $('#target-content').hide()" hx-on::after-request="$('#target-content').show()" hx-indicator="#htmx-indicator"
                >
                <div class="p-1 rounded-lg bg-cyan-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                    </svg>
                </div>
                <span class="font-medium">Jobs</span>
            </div>
            <div class="flex items-center w-full border shadow-sm py-2 px-3 rounded-xl text-slate-500 bg-white space-x-2 text-sm cursor-pointer hover:bg-slate-300 url-links ">
                <div class="p-1 rounded-lg bg-cyan-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                    </svg>
                </div>
                <span class="font-medium">Employers</span>
            </div>
            <div class="flex items-center w-full border shadow-sm py-2 px-3 rounded-xl text-slate-500 bg-white space-x-2 text-sm cursor-pointer hover:bg-slate-300 url-links ">
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