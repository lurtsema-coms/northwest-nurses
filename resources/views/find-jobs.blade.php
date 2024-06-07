@extends('layouts.applicant')
@section('content')
<div 
    id="modal-center" 
    hx-on="htmx:afterSwap: $(this).removeClass('hidden')"
    class="modal-center modal-applicant fixed inset-0 h-screen w-full bg-black bg-opacity-75  p-4 z-10 overflow-y-auto hidden">
    
</div>
<div class="search-section overflow-hidden relative">
    <div class="z-[-1] bg-custom-gradient-y absolute inset-0"></div>
    <img class="absolute z-[-2] min-h-full min-w-full object-cover md:translate-y-[-25%]" src="{{ asset('img/landing-page/image-no-filter.jpg') }}" alt="">
    <div class="search-section-container min-h-96 md:min-h-[500px] relative flex flex-col justify-center md:justify-end">
        <div class="top-search-bar flex flex-col justify-end items-center px-4 md:px-5 md:mt-16 md:pb-10">
            <form action="/find-jobs" class="search-form container max-w-screen-lg flex flex-col align-center justify-center md:mb-5">
                <div class="form-top flex flex-col md:flex-row align-center justify-center">
                    <select name="location" class="p-5 py-3 min-w-[300px] text-primary text-lg font-semibold rounded-t-2xl md:rounded-tr-none md:rounded-l-2xl border-none focus:outline-none focus:ring-0" name="" id="">
                        <option value="" selected disabled>Location</option>
                        @foreach (config('global.us_states') as $location)
                        <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </select>
                    <input name="query" class="py-3 grow border-none text-lg focus:outline-none focus:ring-0 text-primary" type="text" placeholder="Job title or company" required>
                    <div class="py-3 search-btn-wrapper px-3 rounded-b-2xl md:rounded-bl-none md:rounded-r-2xl bg-white flex items-center content-center ">
                        <button class="bg-primary hover:opacity-75 text-white text-lg px-5 py-2 rounded-full flex-grow flex flex-row justify-center align-center gap-2" type="submit"><p>Search</p> <span class="material-symbols-outlined">search</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container mx-auto px-3 flex flex-col lg:flex-row lg:justify-around py-10 gap-5">
    <div class="job-listing grow md:mx-0 flex flex-col gap-5">
        @if (count($activeJobPosts))

        @endif
        @foreach ($activeJobPosts as $jobPost)
        <div class="job-list-card lg:max-w-screen-sm bg-white border-2 border-gray-300 p-5 gap-5 rounded-xl shadow-md">
            <div class="job-list-card-header grow flex flex-row pb-3 justify-between gap-5">
                <div>
                    <h2 class="font-bold text-2xl">{{ $jobPost->address }}</h2>
                    <h4 class="font-semibold text-xl">{{ $jobPost->job_title }}</h4>
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
                    hx-get="/find-jobs?{{ $htmxParamString }}&id={{ $jobPost->id }}"
                    hx-target=".job-info-section"
                    hx-push-url="true"
                    class="bg-primary hover:opacity-75 text-white px-5 py-2 rounded-full whitespace-nowrap">
                    View Job
                </button>
            </div>
        </div>
        @endforeach
        {{ $activeJobPosts->links('vendor.pagination.custom-pagination') }}
    </div>
    <div 
        id="job-info-section" 
        class="job-info-section"
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

    $(document).on('htmx:afterSwap', function(event) {
        if ($(event.target).is('#job-info-section')) {
            if ($(window).width() <= 768) {
                $('html, body').animate({
                    scrollTop: $('#job-info-section').offset().top
                }, 'slow');
            }
        }
    });

</script>
@endsection