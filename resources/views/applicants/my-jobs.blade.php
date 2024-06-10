@extends('layouts.applicant')
@section('content')
<div class="container mx-auto">
	<h1 class="text-3xl text-center font-bold my-10">My Jobs</h1>
</div>
<div class="container mx-auto px-3 flex flex-col lg:flex-row lg:justify-around py-10 gap-5">
  <div class="job-listing grow md:mx-0 flex flex-col gap-5">
    @if (count($myJobs))
        @foreach ($myJobs as $jobPost)
        @include('components.find-job-page.job-posting-card', ['jobPost' => $jobPost])
        @endforeach ()
        {{ $myJobs->links('vendor.pagination.custom-pagination') }}
    @else
        <h3 class="text-center text-slate-500 italic">Wow, so empty... :((</h3>
        <h1 class="text-center text-slate-500 italic">Click Find Jobs and start applying now</h1>
    @endif

  </div>
  <div id="job-info-section" class="job-info-section">
      @if ($selectedJobPost)
      @include('components.find-job-page.job-info')
      @endif
  </div>
</div>
@endsection
@section('scripts')
<script>
  $(document).on('htmx:beforeSend', function(event) {
        if ($($(event.target).attr('hx-target')).is('#job-info-section')) {
            if ($(window).width() <= 1023) {
                $('html, body').animate({
                    scrollTop: $('#job-info-section').offset().top
                }, 100);
            }
        }
    });
</script>
@endsection