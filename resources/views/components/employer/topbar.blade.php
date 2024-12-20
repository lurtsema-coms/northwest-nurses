<div class="flex items-center justify-between h-16">
    <div class="flex items-center" id="topbar">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-slate-600 hover:cursor-pointer" id="menu-bar">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
        <div>
            @include('components.employer.module-title', ['module_title' => $module_title])
        </div>
    </div>
    {{-- Settings Button --}}
    <div class="flex">
        <div class="relative px-3 py-2 mr-3 bg-white rounded-md shadow-sm hover:cursor-pointer hover:shadow-md" id="profile-button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-slate-600">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
            <div class="hidden" id="profile-setting">
                <div class="absolute right-0 z-10 flex flex-col w-48 transition-all bg-white shadow-md top-12 text-slate-500">
                    @if (auth()->user()->role != 'admin')
                        <a class="flex px-5 py-2 space-x-2 text-sm items-centler hover:bg-slate-300"
                            hx-get="{{ route('employer.profile', auth()->user()->id) }}" hx-target="#target-content" hx-push-url="true" hx-on:click="removeBgColor(event)"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <span>Profile</span>
                        </a>
                    @endif
                    <form class="flex" action="{{ route('logout') }}" method="POST">
                    @csrf
                        <button class="flex items-center flex-1 px-5 py-2 space-x-2 text-sm hover:bg-slate-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                            </svg>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @if (auth()->user()->role != 'admin')
            <div class="px-3 py-2 bg-white rounded-md shadow-sm mr-7 hover:cursor-pointer hover:shadow-md" id="notification-button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-slate-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"/>
                </svg>
                <div class="hidden" id="notification-setting">
                    <div class="absolute z-10 flex flex-col transition-all bg-white border shadow-sm w-80 sm:w-96 top-14 right-7 text-slate-500" hx-get="{{ route('employer.notification') }}" hx-trigger="load" hx-target="#notification-content" >
                        <div>
                            <h1 class="p-2 pl-4 text-xl font-bold shadow-sm text-start">Job Notifications:</h1>
                        </div>
                        <div id="notification-content" class="overflow-y-auto max-h-96 scrollbar-thin scrollbar-thumb-cyan scrollbar-thumb-rounded" >
                        </div>
                        <div class="flex justify-center shadow-custom">
                            <a href="/employer-job" class="p-4 pl-4 font-bold text-start text-cyan-600 ">Go to Jobs</a>
                        </div>
                    </div>
                </div>
                <div hx-get="{{ route('employer.bell') }}" hx-trigger="load" hx-target="#notification-bell" >
                    <div id="notification-bell" >
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>