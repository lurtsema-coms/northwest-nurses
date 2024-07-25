@extends('layouts.applicant')
@section('content')
<div class="relative overflow-hidden search-section">
    <div class="z-[-1] bg-custom-gradient-x md:bg-custom-gradient-y absolute inset-0"></div>
    <img class="absolute z-[-2] min-h-full min-w-full object-cover md:translate-y-[-25%]" src="{{ asset('img/landing-page/image-no-filter.jpg') }}" alt="">
    <div class="search-section-container min-h-96 md:min-h-[500px] relative flex flex-col justify-center md:justify-end">
        <div class="flex flex-col items-center justify-end px-4 top-search-bar md:px-5 md:mb-8">
            <h1 class="mb-5 text-4xl font-bold text-center text-white md:text-5xl md:mb-10">Your Gateway to Exceptional Travel Nursing Opportunities</h1>
            <form action="/find-jobs" method="GET" class="container flex flex-col justify-center max-w-screen-lg search-form align-center md:mb-5" autocomplete="off">
                <div class="flex flex-col justify-center form-top md:flex-row align-center">
                    <select name="location" class="p-5 py-3 min-w-[300px] text-primary text-lg font-semibold rounded-t-2xl md:rounded-tr-none md:rounded-l-2xl border-none focus:outline-none focus:ring-0" name="" id="">
                        <option value="" selected>All Location</option>
                        @foreach (config('global.us_states') as $location)
                        <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </select>
                    <input name="search" class="py-3 text-lg border-none grow focus:outline-none focus:ring-0 text-primary" type="text" placeholder="Job title or company">
                    <div class="flex items-center content-center px-3 py-3 bg-white search-btn-wrapper rounded-b-2xl md:rounded-bl-none md:rounded-r-2xl ">
                        <button class="flex flex-row justify-center flex-grow gap-2 px-5 py-2 text-lg text-white rounded-full bg-primary hover:opacity-75 align-center" type="submit"><p>Search</p> <span class="material-symbols-outlined">search</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div>
    <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide opacity-75 hover:opacity-100 cursor-default hover:scale-[1.2] transition-all min-w-fit aspect-[4/3] relative flex pb-2 justify-center items-end">
                <img class="object-cover min-h-full min-w-full absolute top-0 z-[-1]" src="{{ asset('img/stock/landing-01.jpg') }}" alt="">
            </div>
            <div class="swiper-slide opacity-75 hover:opacity-100 cursor-default hover:scale-[1.2] transition-all min-w-fit aspect-[4/3] relative flex pb-2 justify-center items-end">
                <img class="object-cover min-h-full min-w-full absolute top-0 z-[-1]" src="{{ asset('img/stock/landing-02.jpg') }}" alt="">
            </div>
            <div class="swiper-slide opacity-75 hover:opacity-100 cursor-default hover:scale-[1.2] transition-all min-w-fit aspect-[4/3] relative flex pb-2 justify-center items-end">
                <img class="object-cover min-h-full min-w-full absolute top-0 z-[-1]" src="{{ asset('img/stock/landing-03.jpg') }}" alt="">
            </div>
            <div class="swiper-slide opacity-75 hover:opacity-100 cursor-default hover:scale-[1.2] transition-all min-w-fit aspect-[4/3] relative flex pb-2 justify-center items-end">
                <img class="object-cover min-h-full min-w-full absolute top-0 z-[-1]" src="{{ asset('img/stock/landing-04.jpg') }}" alt="">
            </div>
            <div class="swiper-slide opacity-75 hover:opacity-100 cursor-default hover:scale-[1.2] transition-all min-w-fit aspect-[4/3] relative flex pb-2 justify-center items-end">
                <img class="object-cover min-h-full min-w-full absolute top-0 z-[-1]" src="{{ asset('img/stock/landing-05.jpg') }}" alt="">
            </div>
            <div class="swiper-slide opacity-75 hover:opacity-100 cursor-default hover:scale-[1.2] transition-all min-w-fit aspect-[4/3] relative flex pb-2 justify-center items-end">
                <img class="object-cover min-h-full min-w-full absolute top-0 z-[-1]" src="{{ asset('img/stock/landing-06.jpg') }}" alt="">
            </div>
            <div class="swiper-slide opacity-75 hover:opacity-100 cursor-default hover:scale-[1.2] transition-all min-w-fit aspect-[4/3] relative flex pb-2 justify-center items-end">
                <img class="object-cover min-h-full min-w-full absolute top-0 z-[-1]" src="{{ asset('img/stock/landing-07.jpg') }}" alt="">
            </div>
            <div class="swiper-slide opacity-75 hover:opacity-100 cursor-default hover:scale-[1.2] transition-all min-w-fit aspect-[4/3] relative flex pb-2 justify-center items-end">
                <img class="object-cover min-h-full min-w-full absolute top-0 z-[-1]" src="{{ asset('img/stock/landing-08.jpg') }}" alt="">
            </div>
            <div class="swiper-slide opacity-75 hover:opacity-100 cursor-default hover:scale-[1.2] transition-all min-w-fit aspect-[4/3] relative flex pb-2 justify-center items-end">
                <img class="object-cover min-h-full min-w-full absolute top-0 z-[-1]" src="{{ asset('img/stock/landing-09.jpg') }}" alt="">
            </div>
            <div class="swiper-slide opacity-75 hover:opacity-100 cursor-default hover:scale-[1.2] transition-all min-w-fit aspect-[4/3] relative flex pb-2 justify-center items-end">
                <img class="object-cover min-h-full min-w-full absolute top-0 z-[-1]" src="{{ asset('img/stock/landing-10.jpg') }}" alt="">
            </div>
            <div class="swiper-slide opacity-75 hover:opacity-100 cursor-default hover:scale-[1.2] transition-all min-w-fit aspect-[4/3] relative flex pb-2 justify-center items-end">
                <img class="object-cover min-h-full min-w-full absolute top-0 z-[-1]" src="{{ asset('img/stock/landing-11.jpg') }}" alt="">
            </div>
        </div>
    
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>
<div class="container flex flex-col gap-5 py-10 mx-auto">
    <div class="photo-carousel"></div>
    <div class="flex flex-col items-center">
        <h2 class="text-3xl font-extrabold text-center">At Northwest Nurses, we offer an extensive array of services tailored to meet the unique needs of healthcare professionals like you.</h2>
        <div class="flex flex-col items-start justify-center w-full gap-5 mt-5 mb-10 md:flex-row">
            <p class="w-full text-left"><span class="font-bold">Travel Nursing</span>: Explore new horizons and advance your career with Northwest Nurses' travel nursing opportunities. Travel nurses enjoy competitive pay, comprehensive benefits, and the excitement of working in diverse healthcare settings across the country. Whether you're seeking adventure or professional growth, our travel nursing positions offer the perfect blend of flexibility and stability.</p>
            <p class="w-full text-left"><span class="font-bold">Allied Health</span>: Join the forefront of healthcare innovation as an allied health professional. From radiologic technologists to physical therapists, our allied health positions allow you to utilize your specialized skills in diverse settings.</p>
            <p class="w-full text-left"><span class="font-bold">Per Diem Jobs</span>: Enjoy the flexibility of per diem work with Northwest Nurses. Whether you're looking to supplement your income or prefer a more flexible schedule, our per diem positions offer rewarding experiences without long-term commitment. </p>
        </div>
        <button class="px-5 py-2 text-white rounded-full bg-primary hover:opacity-75 whitespace-nowrap">See All Services</button>
    </div>
</div>
<div class="bg-primary">
    <div class="container mx-auto">
        <div class="flex flex-col w-full md:flex-row md:justify-evenly md:items-stretch">
            <div class="flex-1 min-h-[300px] relative overflow-hidden">
                <div class="absolute inset-0 z-10 bg-custom-gradient-x "></div>
                <img class="absolute top-0 object-cover min-w-full min-h-full" src="{{ asset('img/stock/landing-05.jpg') }}" alt="Sample Image">
            </div>
            <div class="flex flex-col p-10 m-0 text-white bg-primary md:w-1/2">
                <h2 class="mb-3 text-4xl font-bold">Why Us?</h2>
                <p class="mb-3 leading-5 text-md">When you choose Northwest Nurses, you're joining a community of satisfied healthcare professionals who trust us for:</p>
                <div class="flex flex-col gap-5 xl:flex-row">
                    <div class="my-2">
                        <p class="pb-3 font-bold">Industry-Leading Technology:</p>
                        <p>Northwest Nurses uses cutting-edge technology to streamline processes and enhance your experience. Our user-friendly platform makes it easy to search for jobs, submit applications, and communicate with your recruiter, all from the convenience of your computer or mobile device.</p>
                    </div>
                    <div class="my-2">
                        <p class="pb-3 font-bold">Personalized Support:</p>
                        <p>At Northwest Nurses, your success is our top priority. Our team of experienced recruiters provides personalized support every step of the way, from matching you with the perfect job to assisting with onboarding and beyond.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container flex flex-col items-center justify-center gap-5 py-10 mx-auto">
    <h1 class="mb-5 text-4xl font-extrabold text-center">Most Recent Job Postings</h1>
    @if (count($mostRecentJobPostings))
    <div class="grid gap-5 xl:grid-cols-2">
        @foreach ($mostRecentJobPostings as $jobPosting)
        <div class="flex flex-col justify-between overflow-hidden border border-gray-200 shadow-md landing-job-card md:flex-row padding-0 rounded-2xl">
            <div class="w-full aspect-[8/3] md:w-72 relative flex-none overflow-hidden">
                <img class="absolute top-0 left-0 object-cover min-w-full min-h-full" src="{{ $jobPosting->img_link }}?v={{ strtotime(date('Y-m-d H:00:00')) }}" alt="">
            </div>
            <div class="flex flex-col items-start justify-between flex-grow gap-1 px-5 py-5 ml-3">
                <h1 class="text-lg font-extrabold leading-5 text-wrap">{{ $jobPosting->job_title }}</h1>
                <p class="font-bold">{{ $jobPosting->address }}</p>
                <p class="font-bold">{{ $jobPosting->pay }}</p>
                <a href="/find-jobs?id={{ $jobPosting->id }}#job-info-section" class="px-5 py-2 text-white rounded-full bg-primary hover:opacity-75 whitespace-nowrap">View Job</a>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="flex items-center justify-center gap-3">
        <h3 class="italic text-center text-slate-500">Wow so empty... </h3>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-slate-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0 0 12.016 15a4.486 4.486 0 0 0-3.198 1.318M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
        </svg>
    </div>
    @endif
    <a href="/find-jobs" class="px-5 py-2 mt-3 text-white rounded-full bg-primary hover:opacity-75 whitespace-nowrap">More Jobs</a>
</div>
<div class="text-white bg-primary">
    <div class="container flex flex-col items-center justify-center gap-5 py-10 mx-auto">
        <h1 class="text-4xl font-bold text-center">How It Works</h1>
        <div class="flex flex-col items-center justify-center gap-10 my-5 lg:flex-row lg:justify-between">
            <div class="flex flex-col items-center justify-start flex-1 gap-5">
                <h4 class="px-5 py-1 border rounded-full border-slate-50">Step 1: Register</h4>
                <p class="text-center">
                    Begin your journey by completing your profile with Northwest Nurses. The more detailed your profile, the better we can match you with opportunities that suit your preferences and qualifications.
                </p>
            </div>
            <div class="flex flex-col items-center justify-start flex-1 gap-5">
                <h4 class="px-5 py-1 border rounded-full border-slate-50">Step 2: Explore</h4>
                <p class="text-center">
                    Dive into our extensive database of job listings to find positions that align with your interests, expertise, and geographic preferences. With thousands of available jobs spanning various specialties and locations, you're sure to find the perfect match.
                </p>
            </div>
            <div class="flex flex-col items-center justify-start flex-1 gap-5">
                <h4 class="px-5 py-1 border rounded-full border-slate-50">Step 3: Connect</h4>
                <p class="text-center">
                    Once you've found a position that piques your interest, simply click "Apply Now" to notify your dedicated recruiter. From there, our team will guide you through the application process, provide additional details about the position, and support you every step of the way.
                </p>
            </div>
        </div>
    <a href="#" class="px-5 py-2 mt-3 font-bold bg-white rounded-full hover:opacity-75 text-primary whitespace-nowrap">Search Jobs Now</a>
    </div>

</div>
@endsection
@section('scripts')
<script>
    const swiper = new Swiper(".swiper", {
        // effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        allowTouchMove: false,
        autoplay: {
            delay: 1000, 
            disableOnInteraction: false,
        },
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        // coverflowEffect: {
        //     rotate: 0,
        //     stretch: 0,
        //     depth: 100,
        //     modifier: 0,
        //     slideShadows: true,
        // },
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
</script>
@endsection

