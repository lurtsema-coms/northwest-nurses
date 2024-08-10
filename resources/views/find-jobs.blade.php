@extends('layouts.applicant')
@section('title', 'Find Jobs')
@section('content')
<div 
    id="modal-center" 
    hx-on="htmx:afterSwap: $(this).removeClass('hidden')"
    class="fixed inset-0 z-10 hidden w-full h-screen p-4 overflow-y-auto bg-black bg-opacity-75 modal-center modal-applicant">
    
</div>
<div class="relative overflow-hidden search-section">
    <div class="z-[-1] bg-custom-gradient-y absolute inset-0"></div>
    <img class="absolute z-[-2] min-h-full min-w-full object-cover md:translate-y-[-25%]" src="{{ asset('img/landing-page/4.webp') }}" alt="">
    <div class="search-section-container min-h-96 md:min-h-[500px] relative flex flex-col justify-center md:justify-end">
        <div class="flex flex-col items-center justify-end px-4 top-search-bar md:px-5 md:mt-16 md:pb-10">
            <form action="/find-jobs" class="container flex flex-col justify-center max-w-screen-lg search-form align-center md:mb-5" autocomplete="off">
                <div class="flex flex-col justify-center form-top md:flex-row align-center">
                    <select name="location" class="p-5 py-3 lg:min-w-[300px] text-primary text-lg font-semibold rounded-t-2xl md:rounded-tr-none md:rounded-l-2xl border-none focus:outline-none focus:ring-0" name="" id="">
                        <option value="" selected>All Location</option>
                        @foreach (config('global.us_states') as $key => $location)
                        <option value="{{ $key }}" {{ $key == $request?->location ? 'selected' : '' }}>{{ $location }} ({{ $key }})</option>
                        @endforeach
                    </select>
                    <input name="search" value="{{ $request?->search }}" class="py-3 text-lg border-none grow focus:outline-none focus:ring-0 text-primary" type="text" placeholder="Job title or company">
                    <input type="hidden" name="show_applied_jobs" value="{{ $request->show_applied_jobs }}">
                    <div class="flex items-center content-center px-3 py-3 bg-white search-btn-wrapper rounded-b-2xl md:rounded-bl-none md:rounded-r-2xl ">
                        <button class="flex flex-row justify-center flex-grow gap-2 px-5 py-2 text-lg text-white rounded-full bg-primary hover:opacity-75 align-center" type="submit"><p>Search</p> <span class="material-symbols-outlined">search</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container flex flex-col gap-5 py-10 mx-auto lg:flex-row lg:justify-around">
    <div class="flex flex-col gap-5 job-listing md:mx-0 lg:w-1/2">
        @role('applicant')
        <form action="{{ route('find-jobs') }}" method="GET" x-data="{ showAppliedJobs: {{ $request->show_applied_jobs == 'true' ? 'true' : 'false' }} }" x-ref="filterForm">
            <input type="hidden" name="show_applied_jobs" :value="!showAppliedJobs" x-ref="showAppliedJobsInput">
            @foreach ($request->except(['id', 'page', 'show_applied_jobs']) as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" {{ $request->show_applied_jobs == 'true' ? 'checked' : '' }} :checked="showAppliedJobs" @change="showAppliedJobs = !showAppliedJobs; $refs.filterForm.submit()" class="sr-only peer">
                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                <span class="text-sm font-medium text-gray-900 ms-3">Show Jobs I've Applied To</span>
            </label>
        </form>
        @endrole
        @if (!count($activeJobPosts))
        <h3 class="italic text-slate-500">Wow, such empty... :((</h3>
        @endif
        @foreach ($activeJobPosts as $jobPost)
        @include('components.find-job-page.job-posting-card', ['jobPost' => $jobPost])
        @endforeach
        {{ $activeJobPosts->links('vendor.pagination.custom-pagination') }}
    </div>
    <div 
        id="job-info-section" 
        class="job-info-section lg:w-1/2"
        hx-on="htmx:afterSwap: $('#modal-center').addClass('hidden');"
        ">
        @if (count($activeJobPosts))
        @include('components.find-job-page.job-info')
        @endif
    </div>
</div>
@include('components.dialog', ['title' => 'Your form has been updated!',
    'text_content' => '',
    'id' => 'modal-success',
    'icon' => 'success',
    'showButtonCancel' => false,
    'showButtonSubmit' => true,
    'confirmButtonText' => 'Ok',
])
@endsection
@section('scripts')
<script>
    const swiper = new Swiper(".swiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        autoplay: {
            delay: 3000, 
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 100,
            modifier: 0,
            slideShadows: true,
        },
        breakpoints: {
            300: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
            400: {
                slidesPerView: 2,
                spaceBetween: 0,
            },
            700: {
                slidesPerView: 3,
                spaceBetween: 0,
            },
            1200: {
                slidesPerView: 5,
                spaceBetween: 0,
            },
        },
    });

    $(".cancel-btn").click(function() {
        $(".modal-center").addClass("hidden");
    });

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