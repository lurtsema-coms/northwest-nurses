<div class="absolute top-0 flex items-center h-16 text-xl select-none left-16">
    {{ $module_title }}
</div>

<div class="relative h-auto max-w-5xl mx-auto bg-white border shadow-sm py-7 rounded-2xl">
    <div class="h-full px-5 overflow-auto sm:px-10">
        <div class="absolute left-0 flex font-medium text-sky-600 -top-9">
            <span class="flex items-center space-x-2 cursor-pointer hover:opacity-70"
                hx-get="{{ route('admin.accounts') }}" hx-target="#target-content" hx-push-url="true" hx-on::after-request="$('input').val()"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span>Back to Accounts</span>
            </span>
        </div>

        <div class="flex flex-wrap justify-between gap-2 sm:gap-8">
            <div>
                <p class="font-medium">
                    @if ($user->role === 'employer')
                        {{ $user->employerDetail->name }}
                    @else
                        {{ $user->applicantDetail->first_name.' '.$user->applicantDetail->last_name }}
                    @endif
                </p>
                <span class="relative">
                    {{ ucfirst($user->role) }}
                </span>
            </div>
            @if ($user->role === 'applicant' && (bool)$user->resume())
                <div x-data="{ 
                        showModal: false, 
                        currentAttachment: '{{ route('showResume') }}?file_path=' + encodeURIComponent('{{ $user->resume()?->file_path }}') 
                    }">
                    <button 
                        @click="showModal = true" 
                        class="px-4 py-2 text-sm text-white bg-cyan-600 rounded-xl hover:opacity-70">
                        View Resume
                    </button>
            
                    <!-- Modal -->
                    <div class="fixed inset-0 z-20 overflow-y-auto bg-black bg-opacity-50" x-show="showModal" x-cloak>
                        <div class="flex items-center justify-center min-h-screen px-5 py-10">
                            <div 
                                class="w-full max-w-6xl p-10 m-auto bg-white shadow-lg rounded-2xl" 
                                @click.outside="showModal = false">
                                <embed :src="currentAttachment" width="100%" height="700px"></embed>
                                <button 
                                    type="button" 
                                    class="px-4 py-2 mt-5 border rounded-lg hover:bg-gray-200 hover:cursor-pointer" 
                                    @click="showModal = false">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="grid mt-8 xl:grid-cols-2 gap-y-2 gap-x-8">
            <div class="flex flex-col sm:gap-8 sm:flex-row">
                <div class="w-full font-medium max-w-36 shrink-0">Email:</div>
                <div>{{ $user->email }}</div>
            </div>
            <div class="flex flex-col sm:gap-8 sm:flex-row">
                <div class="w-full font-medium max-w-36 shrink-0">Contact Number:</div>
                <div>{{ $user->contact_number }}</div>
            </div>
            @if ($user->role === 'applicant')
                <div class="flex flex-col sm:gap-8 sm:flex-row">
                    <div class="w-full font-medium max-w-36 shrink-0">Birth Date:</div>
                    <div>{{ $user->applicantDetail->birthdate }}</div>
                </div>
                <div class="flex flex-col sm:gap-8 sm:flex-row">
                    <div class="w-full font-medium max-w-36 shrink-0">Sex:</div>
                    <div>{{ $user->applicantDetail->sex }}</div>
                </div>
            @endif
            <div class="flex flex-col sm:gap-8 sm:flex-row">
                <div class="w-full font-medium max-w-36 shrink-0">Address:</div>
                <div>{{ $user->address }}</div>
            </div>
            <div class="flex flex-col sm:gap-8 sm:flex-row">
                <div class="w-full font-medium max-w-36 shrink-0">Date Joined:</div>
                <div>
                    @php
                        use Carbon\Carbon;
                    @endphp
                    {{ Carbon::parse($user->created_at)->format('D, F j, Y') }}
                </div>
            </div>
        </div>
    </div>
</div>

@php
    $job_applications = $user->jobApplications()->with('details')->orderBy('id', 'desc')->paginate(5);
@endphp

@if (!$job_applications->isEmpty())
    <div class="relative h-auto max-w-2xl mx-auto mt-8 bg-white border shadow-sm py-7 rounded-2xl">
        <div class="h-full px-5 overflow-auto sm:px-10">
            <p class="font-medium text-cyan-600">Job Application History</p>
            @foreach ($job_applications as $job_application)
                <div class="mt-4">
                    <!-- Job Title -->
                    <p class="font-medium">{{ $job_application->details->job_title }}</p>
                    
                    <!-- Status History -->
                    <ul class="pl-10 mt-2 space-y-2 list-disc">
                        @php
                            $status_history = json_decode($job_application->status_history, true); // Decode JSON string into an array
                        @endphp
                        @if (!empty($status_history))
                            @foreach ($status_history as $status)
                                <li class="text-sm text-gray-600">
                                    <strong>{{ $status[key($status)] }}</strong>: {{ Carbon::parse(key($status))->format('D, F j, Y') }}
                                </li>
                            @endforeach
                        @else
                            <li class="text-sm text-gray-600">No status history available.</li>
                        @endif
                    </ul>
                </div>
            @endforeach
            <div class="mt-5">
                {{ $job_applications->appends(request()->query())->links('vendor.pagination.custom-pagination-backend') }}
            </div>
        </div>
    </div>
@endif