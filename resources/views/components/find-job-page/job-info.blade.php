<div class="sticky top-0 mx-auto max-w-screen-md flex-grow bg-white border-2 border-gray-300 gap-5 rounded-xl overflow-hidden shadow-md">
  <div class="w-full max-h-64 min-h-52 overflow-hidden">
      <img class="w-full" src="{{ $jobPost->img_link }}?v={{ time() }}" alt="">
  </div>
  <div class="p-5">
      <div class="my-5">
          <h2 class="font-bold text-2xl">{{ $jobPost->job_title }}, {{ $jobPost->address }}</h2>
          <h2 class="font-bold text-2xl text-primary">{{ $jobPost->pay }}</h2>
          <div class="flex flex-col sm:flex-row justify-between mt-5 gap-5">
              <p class="text-gray-500">Job ID: {{ $jobPost->job_id }}</p>
              @auth
              @role('applicant')
                <button id="apply-now-btn" class="bg-primary hover:opacity-75 text-white px-5 py-2 rounded-full">Apply Now</button>
              @endrole
              @role('employer')
                <button class="bg-primary hover:opacity-75 text-white px-5 py-2 rounded-full opacity-75" disabled>Apply Now</button>
              @endrole
              @endauth
              @guest
                <a href="/login" class="bg-primary hover:opacity-75 text-white px-5 py-2 rounded-full">Login to Apply</a>
              @endguest
          </div>
      </div>
      <hr class="border-t-2 border-gray-300">
      <div class="overflow-y-auto max-h-[450px]">
          <div class="my-5">
              <h1 class="text-2xl font-extrabold">Job Details</h1>
              <div class="flex flex-col gap-2 my-3">
                  <div class="flex gap-3 text-gray-600">
                      <span class="material-symbols-outlined">medical_services</span>
                      <p>Profession: <span class="font-semibold">{{ $jobPost->profession }}</span></p>
                  </div>
                  <div class="flex gap-3 text-gray-600">
                      <span class="material-symbols-outlined">payments</span>
                      <p>Pay: <span class="font-semibold">{{ $jobPost->pay }}</span></p>
                  </div>
                  <div class="flex gap-3 text-gray-600">
                      <span class="material-symbols-outlined">date_range</span>
                      <p>Assignment Length: <span class="font-semibold">{{ $jobPost->assignment_length }}</span></p>
                  </div>
                  <div class="flex gap-3 text-gray-600">
                      <span class="material-symbols-outlined">medical_services</span>
                      <p>Schedule: <span class="font-semibold">{{ $jobPost->schedule }}</span></p>
                  </div>
                  <div class="flex gap-3 text-gray-600">
                      <span class="material-symbols-outlined">group</span>
                      <p>Openings: <span class="font-semibold">{{ $jobPost->openings }}</span></p>
                  </div>
                  <div class="flex gap-3 text-gray-600">
                      <span class="material-symbols-outlined">calendar_month</span>
                      <p>Start Date: <span class="font-semibold">{{ $jobPost->start_date }}</span></p>
                  </div>
                  <div class="flex gap-3 text-gray-600">
                      <span class="material-symbols-outlined">badge</span>
                      <p>Experience: <span class="font-semibold">{{ $jobPost->experience }}</span></p>
                  </div>
              </div>
          </div>
          <hr class="border-t-2 border-gray-300">
          <div class="my-5">
              <h1 class="text-2xl font-extrabold">Full Job Description</h1>
              <p class="my-5">{!! nl2br(e($jobPost->job_description)) !!}</p>
          </div>
          <div class="mt-8">
              <h1 class="text-xl font-extrabold">Responsibilities:</h1>
              <p class="my-5">{!! nl2br(e($jobPost->responsibilities)) !!}</p>
          </div>
          <div class="mt-8">
              <h1 class="text-xl font-extrabold">Requirements:</h1>
              <p class="my-5">{!! nl2br(e($jobPost->requirements)) !!}</p>
          </div>
      </div>
  </div>
</div>