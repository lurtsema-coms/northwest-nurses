<div id="job-list-card-{{ $jobPost->id }}" hx-swap-oob="true" class="gap-5 p-5 bg-white border-2 border-gray-300 shadow-md job-list-card lg:max-w-screen-sm rounded-xl">
  <div class="flex flex-row justify-between gap-5 pb-3 job-list-card-header grow">
      <div>
        <h2 class="text-2xl font-bold">{{ $jobPost->job_title }}</h2>
        <h4 class="text-xl font-semibold">{{ $jobPost->address }}</h4>
        <p class="text-sm text-gray-400">{{ $jobPost->employer_name }}, {{ $jobPost->location }}</p>
          @auth
          @role('applicant' && $jobPost->applied_date)
          <p class="mt-2 italic text-gray-500">Applied <span class="timeago" datetime="{{ $jobPost->applied_date }} {{ config('app.timezone') }}">{{ $jobPost->applied_date }}</span></p>
          @if ($jobPost->application_status == 'FOR REVIEW')
          <p class="inline-block px-3 mt-2 font-semibold bg-orange-500 rounded text-stone-100">{{ $jobPost->application_status }}</p>
          @elseif ($jobPost->application_status == 'HIRED' || $jobPost->application_status == 'APPROVED')
          <p class="inline-block px-3 mt-2 font-semibold bg-green-500 rounded text-stone-100">{{ $jobPost->application_status }}</p>
          @elseif ($jobPost->application_status == 'REJECTED')
          <p class="inline-block px-3 mt-2 font-semibold bg-red-500 rounded text-stone-100">{{ $jobPost->application_status }}</p>
          @else 
          <p class="inline-block px-3 mt-2 font-semibold rounded bg-slate-500 text-stone-100">{{ $jobPost->application_status }}</p>
          @endif
          @endrole
          @endauth
      </div>
      <p class="text-xl text-primary"><span class="material-symbols-outlined">arrow_forward_ios</span></p>
  </div>
  <hr class="border-t-2 border-gray-300">
  <div class="flex flex-col gap-3 py-3 job-list-card-body">
      <div class="flex gap-3 text-gray-600">
          <span class="material-symbols-outlined">medical_services</span>
          <p>{{ $jobPost->profession }}</p>
      </div>
      <div class="flex gap-3 text-gray-600">
          <span class="material-symbols-outlined">group</span>
          <p>{{ $jobPost->openings }} Opening{{ $jobPost->openings > 1 ? 's' : '' }}</p>
      </div>
      <div class="flex gap-3 text-gray-600">
          <span class="material-symbols-outlined">schedule</span>
          <p>{{ $jobPost->schedule }}</p>
      </div>
  </div>
  <div class="flex flex-col flex-wrap justify-between gap-5 job-list-card-footer sm:flex-row">
      <p class="text-lg font-bold align-middle text-primary">{{ $jobPost->pay }}</p>
      <button 
          hx-get="?id={{ $jobPost->id }}&{{ $htmxParamString ?? '' }}"
          hx-target=".job-info-section"
          hx-push-url="true"
          hx-disabled-elt="this"
          hx-indicator="#htmx-indicator-job-{{ $jobPost->id }}"
          class="px-5 py-2 text-white rounded-full bg-primary hover:opacity-75 whitespace-nowrap"
        >
        View Job
        <svg class="w-5 h-5 text-white animate-spin htmx-indicator" id="htmx-indicator-job-{{ $jobPost->id }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
      </button>
  </div>
</div>