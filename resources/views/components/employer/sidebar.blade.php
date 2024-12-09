<div class="hidden min-h-dvh w-72 shrink-0 md:block" id="sidebar">
    <div class="relative flex w-full h-16">
        <a class="m-auto py-5 text-lg font-bold text-slate-600 hover:opacity-70" id="logo" href="/">
            <span>Northwest Nurses</span>
            <br>
            <span>Allied Health LLC</span>
        </a>
    </div>
    <div class="py-10 pl-7" id="sidebar-links">
        <div class="space-y-3">
            <div class="flex items-center w-full border shadow-sm py-2 px-3 rounded-xl text-slate-500 space-x-2 text-sm cursor-pointer hover:bg-slate-300 url-links {{ Route::is('employer.dashboard') ? 'bg-slate-300' : 'bg-white'  }}" 
                id="dashboard-link"
                hx-boost="true"
                hx-trigger="click" hx-get="{{ route('employer.dashboard') }}" hx-target="#target-content" hx-push-url="true" hx-on:click="removeBgColor(); addBgColorLink(event); $('#target-content').hide()" hx-on::after-request="$('#target-content').show()" hx-indicator="#htmx-indicator"
            >
                <div class="p-1 rounded-lg bg-cyan-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                    </svg>
                </div>
                <span class="font-medium">Dashboard</span>
            </div>
            <div 
                class="flex items-center w-full border shadow-sm py-2 px-3 rounded-xl text-slate-500 space-x-2 text-sm cursor-pointer hover:bg-slate-300 url-links {{ Route::is('employer.job') || Route::is('employer.job.add') || Route::is('employer.job.edit') || Route::is('employer.job.view')  || Route::is('employer.job.applicants') ? 'bg-slate-300' : 'bg-white'  }}"
                id="jobs-link"
                hx-boost="true"
                hx-get="{{ route('employer.job') }}" hx-target="#target-content" hx-push-url="true" hx-on:click="removeBgColor(); addBgColorLink(event); $('#target-content').hide()" hx-on::after-request="$('#target-content').show()" hx-indicator="#htmx-indicator">
                <div class="p-1 rounded-lg bg-cyan-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                    </svg>
                </div>
                <span class="font-medium">Jobs</span>
            </div>
            <div 
                class="flex items-center w-full border shadow-sm py-2 px-3 rounded-xl text-slate-500 space-x-2 text-sm cursor-pointer hover:bg-slate-300 url-links {{ Route::is('employer.m-employee') ? 'bg-slate-300' : 'bg-white'  }}"
                id="m-employee-link"
                hx-boost="true"
                hx-get="{{ route('employer.m-employee') }}" hx-target="#target-content" hx-push-url="true" hx-on:click="removeBgColor(); addBgColorLink(event); $('#target-content').hide()" hx-on::after-request="$('#target-content').show()" hx-indicator="#htmx-indicator">
                <div class="p-1 rounded-lg bg-cyan-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                </div>
                <span class="font-medium">Manage Employees</span>
            </div>
        </div>
    </div>
</div>