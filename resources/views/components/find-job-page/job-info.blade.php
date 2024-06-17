<div class="sticky flex flex-col justify-start items-center max-h-dvh top-0 mx-auto max-w-screen-md flex-grow bg-white border-2 border-gray-300 rounded-xl overflow-hidden shadow-md">
    <div class="w-full relative pt-[calc(3/8*100%)] overflow-hidden">
        <img class="min-h-full min-w-full object-cover absolute top-0" src="{{ $selectedJobPost->img_link }}?v={{ strtotime(date('Y-m-d H:00:00')) }}" alt="">
    </div>
    <div class="px-5 pt-5 pb-2 flex flex-col flex-grow justify-start items-start overflow-hidden">
        <div class="pb-5 w-full">
            <h2 class="font-bold text-2xl">{{ $selectedJobPost->job_title }}</h2>
            <h4 class="font-semibold text-xl">{{ $selectedJobPost->address }}</h4>
            <h2 class="font-bold text-xl text-primary">{{ $selectedJobPost->pay }}</h2>
            <div class="flex flex-col sm:flex-row justify-between mt-5 gap-5">
                <p class="text-gray-500">Job ID: {{ $selectedJobPost->job_id }}</p>
                @auth
                @role('applicant')
                @if (
                \App\Models\JobApplication::where('created_by', auth()->user()->id)
                    ->where('job_posting_id', $selectedJobPost->id)
                    ->exists()
                )
                <button 
                    class="bg-primary text-white px-5 py-2 rounded-full opacity-75" 
                    disabled
                >Applied ✓</button>
                @else
                <button 
                    id="apply-now-btn" 
                    class="bg-primary hover:opacity-75 text-white px-5 py-2 rounded-full" 
                    data-entry-id="{{ $selectedJobPost->id }}" 
                    data-href="{{ route('applicant.get-questions', $selectedJobPost->id ) }}"
                    hx-get="{{ route('applicant.get-questions', $selectedJobPost->id ) }}"
                    hx-target="#modal-center"
                    hx-disabled-elt="this"
                    hx-indicator="#apply-now-btn > .htmx-indicator"
                >
                    Apply Now
                    <svg class="animate-spin h-5 w-5 text-white htmx-indicator" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>            
                </button>
                @endif
                @endrole
                @role('employer')
                <button class="bg-primary hover:opacity-75 text-white px-5 py-2 rounded-full opacity-75" disabled>Apply Now</button>
                @endrole
                @endauth
                @guest
                <a href="/login" class="bg-primary hover:opacity-75 text-white px-5 py-2 rounded-full text-center">Login to Apply</a>
                @endguest
            </div>
        </div>
        <hr class="border-t-2 border-gray-300 w-full">
        <div class="flex-1 overflow-y-auto w-full scrollbar-thin">
            <div class="max-h-full w-full">
                <div class="my-5">
                    <h1 class="text-2xl font-extrabold">Job Details</h1>
                    <div class="flex flex-col gap-2 my-3">
                        <div class="flex gap-3 text-gray-600">
                            <span class="material-symbols-outlined">medical_services</span>
                            <p>Profession: <span class="font-semibold">{{ $selectedJobPost->profession }}</span></p>
                        </div>
                        <div class="flex gap-3 text-gray-600">
                            <span class="material-symbols-outlined">payments</span>
                            <p>Pay: <span class="font-semibold">{{ $selectedJobPost->pay }}</span></p>
                        </div>
                        <div class="flex gap-3 text-gray-600">
                            <span class="material-symbols-outlined">date_range</span>
                            <p>Assignment Length: <span class="font-semibold">{{ $selectedJobPost->assignment_length }}</span></p>
                        </div>
                        <div class="flex gap-3 text-gray-600">
                            <span class="material-symbols-outlined">medical_services</span>
                            <p>Schedule: <span class="font-semibold">{{ $selectedJobPost->schedule }}</span></p>
                        </div>
                        <div class="flex gap-3 text-gray-600">
                            <span class="material-symbols-outlined">group</span>
                            <p>Openings: <span class="font-semibold">{{ $selectedJobPost->openings }}</span></p>
                        </div>
                        <div class="flex gap-3 text-gray-600">
                            <span class="material-symbols-outlined">calendar_month</span>
                            <p>Start Date: <span class="font-semibold">{{ $selectedJobPost->start_date }}</span></p>
                        </div>
                        <div class="flex gap-3 text-gray-600">
                            <span class="material-symbols-outlined">badge</span>
                            <p>Experience: <span class="font-semibold">{{ $selectedJobPost->experience }}</span></p>
                        </div>
                    </div>
                </div>
                <hr class="border-t-2 border-gray-300">
                <div class="my-5">
                    <h1 class="text-2xl font-extrabold">Full Job Description</h1>
                    <p class="my-5">{!! nl2br(e($selectedJobPost->job_description)) !!}</p>
                </div>
                <div class="mt-8">
                    <h1 class="text-xl font-extrabold">Responsibilities:</h1>
                    <p class="my-5">{!! nl2br(e($selectedJobPost->responsibilities)) !!}</p>
                </div>
                <div class="mt-8">
                    <h1 class="text-xl font-extrabold">Requirements:</h1>
                    <p class="my-5">{!! nl2br(e($selectedJobPost->requirements)) !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
