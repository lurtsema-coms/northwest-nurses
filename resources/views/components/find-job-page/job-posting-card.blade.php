<div id="job-list-card-{{ $jobPost->id }}" hx-swap-oob="true" class="job-list-card lg:max-w-screen-sm bg-white border-2 border-gray-300 p-5 gap-5 rounded-xl shadow-md">
  <div class="job-list-card-header grow flex flex-row pb-3 justify-between gap-5">
      <div>
          <h2 class="font-bold text-2xl">{{ $jobPost->address }}</h2>
          <h4 class="font-semibold text-xl">{{ $jobPost->job_title }}</h4>
          @auth
          @role('applicant' && $jobPost->applied_date)
          <p class="italic text-gray-500 mt-2">Applied <span class="timeago" datetime="{{ $jobPost->applied_date }} {{ config('app.timezone') }}">{{ $jobPost->applied_date }}</span></p>
          @if ($jobPost->application_status == 'FOR REVIEW')
          <p class="bg-orange-500 text-stone-100 px-3 rounded mt-2 inline-block font-semibold">{{ $jobPost->application_status }}</p>
          @elseif ($jobPost->application_status == 'HIRED')
          <p class="bg-green-500 text-stone-100 px-3 rounded mt-2 inline-block font-semibold">{{ $jobPost->application_status }}</p>
          @elseif ($jobPost->application_status == 'REJECTED')
          <p class="bg-red-500 text-stone-100 px-3 rounded mt-2 inline-block font-semibold">{{ $jobPost->application_status }}</p>
          @else 
          <p class="bg-slate-500 text-stone-100 px-3 rounded mt-2 inline-block font-semibold">{{ $jobPost->application_status }}</p>
          @endif
          @endrole
          @endauth
      </div>
      <p class="text-xl text-primary"><span class="material-symbols-outlined">arrow_forward_ios</span></p>
  </div>
  <hr class="border-t-2 border-gray-300">
  <div class="job-list-card-body py-3 flex flex-col gap-3">
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
  <div class="job-list-card-footer flex flex-wrap flex-col sm:flex-row justify-between gap-5">
      <p class="font-bold text-primary align-middle text-lg">{{ $jobPost->pay }}</p>
      <button 
          hx-get="?id={{ $jobPost->id }}&{{ $htmxParamString ?? '' }}"
          hx-target=".job-info-section"
          hx-push-url="true"
          hx-disabled-elt="this"
          hx-indicator="#htmx-indicator-job-{{ $jobPost->id }}"
          class="bg-primary hover:opacity-75 text-white px-5 py-2 rounded-full whitespace-nowrap"
        >
        View Job
        <svg class="animate-spin h-5 w-5 text-white htmx-indicator" id="htmx-indicator-job-{{ $jobPost->id }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
      </button>
  </div>
</div>