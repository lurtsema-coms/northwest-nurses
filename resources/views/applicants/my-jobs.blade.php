@extends('layouts.applicant')
@section('content')
<div class="container mx-auto">
	<h1 class="my-10 text-3xl font-bold text-center">My Jobs</h1>
</div>
<div class="container flex flex-col gap-5 py-10 mx-auto lg:flex-row lg:justify-around">
  <div class="flex flex-col gap-5 job-listing md:mx-0 lg:w-1/2">
    @if (count($myJobs))
        @foreach ($myJobs as $jobPost)
        @include('components.find-job-page.job-posting-card', ['jobPost' => $jobPost])
        @endforeach ()
        {{ $myJobs->links('vendor.pagination.custom-pagination') }}
    @else
        <h3 class="italic text-center text-slate-500">Wow, so empty... :((</h3>
        <h1 class="italic text-center text-slate-500">Click Find Jobs and start applying now</h1>
    @endif

  </div>
  <div id="job-info-section" class="job-info-section lg:w-1/2">
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