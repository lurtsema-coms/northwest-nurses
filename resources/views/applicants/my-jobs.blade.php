@extends('layouts.applicant')
@section('content')
<div class="container mx-auto">
	<h1 class="text-3xl text-center font-bold my-10">My Jobs</h1>
</div>
<div class="container mx-auto px-3 flex flex-col lg:flex-row lg:justify-around py-10 gap-5">
  <div class="job-listing grow md:mx-0 flex flex-col gap-5">
      @for ($i = 0; $i < 10; $i++)
      <div class="job-list-card lg:max-w-screen-sm bg-white border-2 border-gray-300 p-5 gap-5 rounded-xl">
          <div class="job-list-card-header grow flex flex-row pb-3 justify-between gap-5">
              <div>
                  <h2 class="font-bold text-2xl">ANCHORAGE, ALASKA</h2>
				  <div class="flex flex-col items-start">
					  <h4 class="font-semibold text-xl">PRN Medical Surgical</h4>
					  <p class="italic text-gray-400 rounded text-nowrap">Applied {{ rand(1, 30) }} day(s) ago</p>
					  <label class="bg-green-600 text-white px-3 rounded font-semibold">Hired</label>
				  </div>
              </div>
              <p class="text-xl text-primary"><span class="material-symbols-outlined">arrow_forward_ios</span></p>
          </div>
          <hr class="border-t-2 border-gray-300">
          <div class="job-list-card-body py-3 flex flex-col gap-3">
              <div class="flex gap-3 text-gray-600">
                  <span class="material-symbols-outlined">medical_services</span>
                  <p>RNFA</p>
              </div>
              <div class="flex gap-3 text-gray-600">
                  <span class="material-symbols-outlined">group</span>
                  <p>1 Opening</p>
              </div>
              <div class="flex gap-3 text-gray-600">
                  <span class="material-symbols-outlined">schedule</span>
                  <p>6x7-Hour 06:30 - 12:00</p>
              </div>
          </div>
          <div class="job-list-card-footer flex flex-wrap flex-col sm:flex-row justify-between gap-5">
              <p class="font-bold text-primary align-middle text-lg">$3,0492 - $5,839 weekly</p>
              <button 
                  hx-get="/job-info"
                  hx-target="#job-info-section"
                  class="bg-primary hover:opacity-75 text-white px-5 py-2 rounded-full whitespace-nowrap">
                  View Job
              </button>
          </div>
      </div>
      @endfor
      <div class="flex flex-row justify-center items-center lg:max-w-screen-sm gap-3">
          <button class="bg-black hover:opacity-75 text-white py-2 px-5 rounded-full">Prev</button>
          <p>1 - 10 of 5,330</p>
          <button class="bg-black hover:opacity-75 text-white py-2 px-5 rounded-full">Next</button>
      </div>
  </div>
  <div id="job-info-section" class="job-info-section">
      @include('components.find-job-page.job-info')
  </div>
</div>

@endsection