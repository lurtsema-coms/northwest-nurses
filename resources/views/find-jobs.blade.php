@extends('layouts.applicant')
@section('content')
<div class="modal-center modal-applicant fixed inset-0 h-screen w-full bg-black bg-opacity-75  p-4 z-10 overflow-y-auto hidden">
    <form action="">
        <div class="modal-box m-auto w-full max-w-3xl bg-white shadow-lg rounded-lg animate-fade-in p-10">
            <div class="modal-content flex flex-col p-3">
                <div class="mb-4">
                    <h1 class="text-xl font-bold text-center mb-2">Want to apply to this job?</h1>
                    <p class="p-2 text-center">The employer wants to know more about you.</p>
                    <p class="p-2 text-center italic text-gray-400">Please answer the questions with honesty to the best of your knowledge and belief.</p>
                </div>
                <div class="flex flex-col gap-10">
                    <div class="space-y-3">
                        <label for="answer_1" class="font-semibold">1. This is a sample question?</label>
                        <textarea name="answer_1" class="py-3 px-4 block w-full focus:border-primary focus:ring-primary border-gray-200 rounded-lg disabled:opacity-50 disabled:pointer-events-none" rows="3" placeholder="Answer..."></textarea>
                    </div>
                    <div class="space-y-3">
                        <label for="answer_1" class="font-semibold">2. This is another sample question?</label>
                        <textarea name="answer_1" class="py-3 px-4 block w-full focus:border-primary focus:ring-primary border-gray-200 rounded-lg disabled:opacity-50 disabled:pointer-events-none" rows="3" placeholder="Answer..."></textarea>
                    </div>
                    <div class="space-y-3">
                        <label for="answer_1" class="font-semibold">3. Yet another sample question, innit?</label>
                        <textarea name="answer_1" class="py-3 px-4 block w-full focus:border-primary focus:ring-primary border-gray-200 rounded-lg disabled:opacity-50 disabled:pointer-events-none" rows="3" placeholder="Answer..."></textarea>
                    </div>
                </div>
                <div class="flex flex-row gap-10 justify-center p-2 mt-5">
                    <button class="cancel-btn" type="button">Cancel</button>
                    <button class="submit-applicant-btn font-semibold py-2 px-5 bg-cyan-800 text-white rounded-full" type="submit">Apply</button>
                </div>
            </div>
        </div>
    </form>
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
                    <input name="query" class="py-3 grow border-none text-lg focus:outline-none focus:ring-0 text-primary" type="text" placeholder="Job title or company">
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
                    hx-get="/job-info/{{ $jobPost->id }}"
                    hx-target=".job-info-section"
                    class="bg-primary hover:opacity-75 text-white px-5 py-2 rounded-full whitespace-nowrap">
                    View Job
                </button>
            </div>
        </div>
        @endforeach
        <div class="flex flex-row justify-center items-center lg:max-w-screen-sm gap-3">
            <button class="bg-black hover:opacity-75 text-white py-2 px-5 rounded-full">Prev</button>
            <p>1 - 10 of 5,330</p>
            <button class="bg-black hover:opacity-75 text-white py-2 px-5 rounded-full">Next</button>
        </div>
    </div>
    <div id="job-info-section" class="job-info-section">
        @if (count($activeJobPosts))
        @include('components.find-job-page.job-info', ['jobPost' => (clone $activeJobPosts)->first()])
        @endif
    </div>
</div>
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

    $(document).on('click', '#apply-now-btn', function() {
        $(".modal-center").removeClass("hidden");
    });
</script>
@endsection