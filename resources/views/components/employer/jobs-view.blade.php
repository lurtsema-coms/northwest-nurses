<div class="absolute top-0 flex items-center h-16 text-xl left-16">
    {{ $module_title }}
</div>
<div class="relative h-auto max-w-5xl px-5 mx-auto bg-white border shadow-sm min-h-96 py-7 rounded-2xl sm:px-10">
    <div class="absolute left-0 flex font-medium text-sky-600 -top-9">
        <span class="flex items-center space-x-2 cursor-pointer hover:opacity-70"
            hx-get="{{ route('employer.job') }}" hx-target="#target-content" hx-push-url="true" hx-on::after-request="$('input').val()"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <span>Back to Jobs</span>
        </span>
    </div>
    <div class="max-w-2xl mx-auto">
        @include('components.find-job-page.job-info')
    </div>
</div>