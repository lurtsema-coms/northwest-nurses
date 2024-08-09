<div class="sticky top-0 flex flex-col items-center justify-start flex-grow w-full overflow-hidden bg-white border-2 border-gray-300 shadow-md max-h-dvh rounded-xl">
    <div class="w-full relative pt-[calc(3/8*100%)] overflow-hidden">
        <img class="absolute top-0 object-cover min-w-full min-h-full" src="{{ $selectedJobPost->img_link }}?v={{ strtotime(date('Y-m-d H:00:00')) }}" alt="">
    </div>
    <div class="flex flex-col items-start justify-start flex-grow w-full px-5 pt-5 pb-2 overflow-hidden">
        <div class="w-full pb-5">
            <h2 class="text-2xl font-bold">{{ $selectedJobPost->job_title }}</h2>
            <h4 class="text-xl font-semibold">{{ $selectedJobPost->address }}</h4>
            <p class="text-sm text-gray-400">{{ $selectedJobPost->employer_name }}, {{ $selectedJobPost->location }}</p>
            <h2 class="text-xl font-bold text-primary">{{ $selectedJobPost->pay }}</h2>
            <div class="flex flex-col justify-between gap-5 mt-5 sm:flex-row">
                <p class="text-gray-500">Job ID: {{ $selectedJobPost->job_id }}</p>
                @auth
                    @role('applicant')
                        @if (
                        \App\Models\JobApplication::where('created_by', auth()->user()->id)
                            ->where('job_posting_id', $selectedJobPost->id)
                            ->exists()
                        )
                            <button 
                                class="px-5 py-2 text-white rounded-full opacity-75 bg-primary" disabled>Applied ✓</button>
                        @elseif (auth()->user()->email_verified_at)
                            <button 
                                id="apply-now-btn" 
                                class="px-5 py-2 text-white rounded-full bg-primary hover:opacity-75" 
                                data-entry-id="{{ $selectedJobPost->id }}" 
                                data-href="{{ route('applicant.get-questions', $selectedJobPost->id ) }}"
                                hx-get="{{ route('applicant.get-questions', $selectedJobPost->id ) }}"
                                hx-target="#modal-center"
                                hx-disabled-elt="this"
                                hx-indicator="#apply-now-btn > .htmx-indicator"
                                onclick="$('body').addClass('overflow-hidden')"
                            >
                                Apply Now
                                <svg class="w-5 h-5 text-white animate-spin htmx-indicator" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>            
                            </button>
                        @else
                        <a href="/verify-email" class="px-5 py-2 text-center text-white rounded-full bg-primary hover:opacity-75">Verify Email to Apply</a>
                        @endif
                    @endrole
                    @role('employer')
                        <button class="px-5 py-2 text-white rounded-full opacity-75 bg-primary hover:opacity-75" disabled>Apply Now</button>
                    @endrole
                @endauth
                @guest
                <a href="/login" class="px-5 py-2 text-center text-white rounded-full bg-primary hover:opacity-75">Login to Apply</a>
                @endguest
            </div>
        </div>
        <hr class="w-full border-t-2 border-gray-300">
        <div class="flex-1 w-full overflow-y-auto scrollbar-thin">
            <div class="w-full max-h-full">
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
                            <p>Expected Start Date: <span class="font-semibold">{{ $selectedJobPost->start_date ?  date("F j, Y", strtotime($selectedJobPost->start_date)) : ''}}</span></p>
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
                    <p class="mb-5">{!! nl2br(e($selectedJobPost->job_description)) !!}</p>
                </div>
                <div class="mt-8">
                    <h1 class="text-xl font-extrabold">Responsibilities:</h1>
                    <p class="mb-5">{!! nl2br(e($selectedJobPost->responsibilities)) !!}</p>
                </div>
                <div class="mt-8">
                    <h1 class="text-xl font-extrabold">Requirements:</h1>
                    <p class="mb-5">{!! nl2br(e($selectedJobPost->requirements)) !!}</p>
                </div>
                <div class="mt-8">
                    <h1 class="text-xl font-extrabold">Benefits:</h1>
                    <p class="mb-5">{!! nl2br(e($selectedJobPost->benefits)) !!}</p>
                </div>
                <div class="mt-8">
                    <h1 class="text-xl font-extrabold">Questions:</h1>
                    <ul class="mb-5">
                        @if ($selectedJobPost->question_1)
                        <li class="mb-3">
                            <div class="flex items-center">
                                <p class="mr-3 text-lg place-self-start font-bolder">•</p><p class="inline-flex">{!! nl2br(e($selectedJobPost->question_1)) !!}</p>
                            </div>
                            @if ($selectedJobPost->answer_1)
                            <p class="pl-3 italic text-gray-400">- {!! nl2br(e($selectedJobPost->answer_1)) !!}</p>
                            @endif
                        </li>
                        @endif
                        @if ($selectedJobPost->question_2)
                        <li class="mb-3">
                            <div class="flex items-center">
                                <p class="mr-3 text-lg place-self-start font-bolder">•</p><p class="inline-flex">{!! nl2br(e($selectedJobPost->question_2)) !!}</p>
                            </div>
                            @if ($selectedJobPost->answer_2)
                            <p class="pl-3 italic text-gray-400">- {!! nl2br(e($selectedJobPost->answer_2)) !!}</p>
                            @endif
                        </li>
                        @endif
                        @if ($selectedJobPost->question_3)
                        <li class="mb-3">
                            <div class="flex items-center">
                                <p class="mr-3 text-lg place-self-start font-bolder">•</p><p class="inline-flex">{!! nl2br(e($selectedJobPost->question_3)) !!}</p>
                            </div>
                            @if ($selectedJobPost->answer_3)
                            <p class="pl-3 italic text-gray-400">- {!! nl2br(e($selectedJobPost->answer_3)) !!}</p>
                            @endif
                        </li>
                        @endif
                   </ul>
                </div>
            </div>
        </div>
    </div>
</div>
