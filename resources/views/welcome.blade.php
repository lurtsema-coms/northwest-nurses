@extends('layouts.applicant')
@section('content')
<div class="search-section overflow-hidden relative">
    <div class="z-[-1] bg-custom-gradient-y absolute inset-0"></div>
    <img class="absolute z-[-2] min-h-full min-w-full object-cover md:translate-y-[-25%]" src="{{ asset('img/landing-page/image-no-filter.jpg') }}" alt="">
    <div class="search-section-container min-h-96 md:min-h-[500px] relative flex flex-col justify-center md:justify-end">
        <div class="top-search-bar flex flex-col justify-end items-center px-4 md:px-5 md:mb-8">
            <h1 class="text-4xl font-bold text-center text-white md:text-5xl mb-5 md:mb-10">Your Gateway to Exceptional Travel Nursing Opportunities</h1>
            <form action="" class="search-form container max-w-screen-lg flex flex-col align-center justify-center md:mb-5">
                <div class="form-top flex flex-col md:flex-row align-center justify-center">
                    <select class="p-5 py-3 min-w-[300px] text-primary text-lg font-semibold rounded-t-2xl md:rounded-tr-none md:rounded-l-2xl border-none focus:outline-none focus:ring-0" name="" id="">
                        <option value="" selected disabled>Location</option>
                        @foreach (config('global.us_states') as $location)
                        <option value="">{{ $location }}</option>
                        @endforeach
                    </select>
                    <input class="py-3 grow border-none text-lg focus:outline-none focus:ring-0 text-primary" type="text" placeholder="Job title or company">
                    <div class="py-3 search-btn-wrapper px-3 rounded-b-2xl md:rounded-bl-none md:rounded-r-2xl bg-white flex items-center content-center ">
                        <button class="bg-primary hover:opacity-75 text-white text-lg px-5 py-2 rounded-full flex-grow flex flex-row justify-center align-center gap-2" type="submit"><p>Search</p> <span class="material-symbols-outlined">search</span></button>
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
<div class="container mx-auto px-3 flex flex-col py-10 gap-5">
    <div class="photo-carousel"></div>
    <div class="flex flex-col items-center">
        <h2 class="font-extrabold text-center text-3xl">At Northwest Nurses, we offer an extensive array of services tailored to meet the unique needs of healthcare professionals like you.</h2>
        <div class="flex flex-col md:flex-row justify-center w-full items-center mt-5 gap-5 mb-10">
            <p class="text-left w-full"><span class="font-bold">Allied Health</span>: Join the forefront of healthcare innovation as an allied health professional. From radiologic technologists to physical therapists, our allied health positions allow you to utilize your specialized skills in diverse settings.</p>
            <p class="text-left w-full"><span class="font-bold">Per Diem Jobs</span>: Enjoy the flexibility of per diem work with Northwest Nurses. Whether you're looking to supplement your income or prefer a more flexible schedule, our per diem positions offer rewarding experiences without long-term commitment. </p>
        </div>
        <button class="bg-primary hover:opacity-75 text-white px-5 py-2 rounded-full whitespace-nowrap">See all services</button>
    </div>
</div>
<div class="bg-primary">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row md:justify-evenly md:items-stretch w-full">
            <div class="flex-1 min-h-[300px] relative overflow-hidden">
                <div class="bg-custom-gradient-x absolute inset-0 z-10 "></div>
                <img class="min-w-full min-h-full absolute object-cover top-0" src="{{ asset('img/stock/landing-05.jpg') }}" alt="Sample Image">
            </div>
            <div class="bg-primary text-white p-10 m-0 md:w-1/2 flex flex-col">
                <h2 class="text-3xl font-bold mb-3">Why Us?</h2>
                <p class="text-md leading-5 mb-3">When you choose Northwest Nurses, you're joining a community of satisfied healthcare professionals who trust us for:</p>
                <div class="flex flex-col xl:flex-row gap-5">
                    <div class="my-2">
                        <p class="font-bold pb-3">Industry-Leading Technology:</p>
                        <p>Northwest Nurses uses cutting-edge technology to streamline processes and enhance your experience. Our user-friendly platform makes it easy to search for jobs, submit applications, and communicate with your recruiter, all from the convenience of your computer or mobile device.</p>
                    </div>
                    <div class="my-2">
                        <p class="font-bold pb-3">Personalized Support:</p>
                        <p>At Northwest Nurses, your success is our top priority. Our team of experienced recruiters provides personalized support every step of the way, from matching you with the perfect job to assisting with onboarding and beyond.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mx-auto px-3 flex flex-col justify-center items-center py-10 gap-5">
    <h1 class="text-3xl text-center font-extrabold">Most Recent Job Postings</h1>
    <div class="grid gap-5 md:grid-cols-2 2xl:grid-cols-3">
        @php
            $photoLinks = [
                'https://www.redfin.com/blog/wp-content/uploads/2023/09/Sitka-alaska.jpg',
                'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQxwL9if9H8D7e6bCLzDUFw6flzNhOaUUnjUpYjwvpgMw&s',
                'https://www.nps.gov/common/uploads/grid_builder/anch/crop16_9/2AEBB6D0-DED7-C590-BBF91C0E33EE7E9A.jpg?width=640&quality=90&mode=crop',
                'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpJzmscM8XxA9s-1R4MaiOy-KInKXB2UoVCPp5U8U6BQ&s',
                'https://youthjournalism.org/wp-content/uploads/2022/11/Alaska-first-city-Ketchikan-Parker-rszd.jpg',
                'https://preview.redd.it/a-shitty-city-with-a-pretty-view-anchorage-v0-xthmxqba6i2a1.jpg?width=1080&crop=smart&auto=webp&s=fe6118e50577d0a31c68d4bb422ce3c64bf86f0b',

            ];
        @endphp
        @foreach ($photoLinks as $link)
        <div class="landing-job-card flex flex-row padding-0 rounded-2xl border border-gray-200 shadow-md overflow-hidden">
            <div class="w-52 relative">
                <img class="h-full object-cover absolute top-0 left-0" src="{{ $link }}" alt="">
            </div>
            <div class="p-3 ml-3">
                <h1 class="font-extrabold text-lg text-nowrap">ANCHORAGE, ALASKA</h1>
                <p class="text-md font-bold">PRN Medical Surgical</p>
                <p class="text-md font-bold">$349 / shift</p>
                <button class="bg-primary mt-3 hover:opacity-75 text-white px-5 py-2 rounded-full whitespace-nowrap">View Job</button>
            </div>
        </div>
        @endforeach
    </div>
    <a href="/find-jobs" class="bg-primary mt-3 hover:opacity-75 text-white px-5 py-2 rounded-full whitespace-nowrap">More Jobs</a>
</div>
<div class="bg-primary text-white">
    <div class="container mx-auto px-3 flex flex-col justify-center items-center py-10 gap-5">
        <h1 class="text-3xl text-center font-bold">How it works</h1>
        <div class="my-5 flex flex-col gap-10 justify-center items-center lg:flex-row lg:justify-between">
            <div class="flex flex-1 flex-col justify-start items-center gap-5">
                <h4 class="border border-slate-50 px-5 py-1 rounded-full">Step 1: Register</h4>
                <p class="text-center">
                    Begin your journey by completing your profile with Northwest Nurses. The more detailed your profile, the better we can match you with opportunities that suit your preferences and qualifications.
                </p>
            </div>
            <div class="flex flex-1 flex-col justify-start items-center gap-5">
                <h4 class="border border-slate-50 px-5 py-1 rounded-full">Step 2: Explore</h4>
                <p class="text-center">
                    Dive into our extensive database of job listings to find positions that align with your interests, expertise, and geographic preferences. With thousands of available jobs spanning various specialties and locations, you're sure to find the perfect match.
                </p>
            </div>
            <div class="flex flex-1 flex-col justify-start items-center gap-5">
                <h4 class="border border-slate-50 px-5 py-1 rounded-full">Step 3: Connect</h4>
                <p class="text-center">
                    Once you've found a position that piques your interest, simply click "Apply Now" to notify your dedicated recruiter. From there, our team will guide you through the application process, provide additional details about the position, and support you every step of the way.
                </p>
            </div>
        </div>
    <a href="#" class="bg-white mt-3 hover:opacity-75 text-primary font-bold px-5 py-2 rounded-full whitespace-nowrap">Search jobs now</a>
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

