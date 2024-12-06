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
                        <p class="text-sm">
                            {{ $user->employerDetail->website }}
                        </p>
                    @else
                        {{ $user->applicantDetail->first_name.' '.$user->applicantDetail->last_name }}
                    @endif
                </p>
                <span class="relative text-sm">
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
                <strong class="w-full max-w-36 shrink-0">Email:</strong>
                <div>{{ $user->email }}</div>
            </div>
            <div class="flex flex-col sm:gap-8 sm:flex-row">
                <strong class="w-full max-w-36 shrink-0">Contact Number:</strong>
                <div>{{ $user->contact_number }}</div>
            </div>
            @if ($user->role === 'applicant')
                <div class="flex flex-col sm:gap-8 sm:flex-row">
                    <strong class="w-full max-w-36 shrink-0">Birth Date:</strong>
                    <div>{{ $user->applicantDetail->birthdate }}</div>
                </div>
                <div class="flex flex-col sm:gap-8 sm:flex-row">
                    <strong class="w-full max-w-36 shrink-0">Sex:</strong>
                    <div>{{ ucfirst($user->applicantDetail->sex) }}</div>
                </div>
            @endif
            <div class="flex flex-col sm:gap-8 sm:flex-row">
                <strong class="w-full max-w-36 shrink-0">Address:</strong>
                <div>{{ $user->address }}</div>
            </div>
            <div class="flex flex-col sm:gap-8 sm:flex-row">
                <strong class="w-full max-w-36 shrink-0">Date Joined:</strong>
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

@if (!$job_applications->isEmpty())
    <div class="relative h-auto max-w-5xl mx-auto mt-8 bg-white border shadow-sm py-7 rounded-2xl">
        <div class="h-full px-5 overflow-auto sm:px-10">
            <div class="flex flex-wrap justify-between gap-4">
                <p class="font-medium text-cyan-600">Job Application History</p>
                <input class="h-10 border border-gray-200 rounded-lg max-w-72 focus:border-slate-400 focus:ring-0 focus:outline-none placeholder:text-slate-400" id="search-btn" type="text" placeholder="Search..."
                    name="search"
                    hx-trigger="keyup changed delay:500ms" 
                    hx-post="{{ route('admin.accounts.history.search', $user->id) }}" 
                    hx-target="#history-table"
                    hx-swap="innerHTML"
                >

            </div>
            <div id="history-table">
                @include('admin.custom.accounts-history-table')
            </div>

        </div>
    </div>
@endif