<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Northwest Nurses</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased bg-slate-50">
        <nav class="bg-black text-white">
            <div class="container mx-auto flex flex-col md:flex-row md:justify-between content-center p-5">
                <div class="flex items-center justify-between">
                    <a href="{{ url('/') }}">
                        <img class="max-w-28" src="https://seeklogo.com/images/N/NVIDIA-logo-BA019CBFAA-seeklogo.com.png" alt="">
                    </a>
                    <button class="nav-hamburger flex flex-col gap-1 md:hidden">
                        <div class="w-[30px] h-[0.25rem] bg-white rounded-full"></div>
                        <div class="w-[30px] h-[0.25rem] bg-white rounded-full"></div>
                        <div class="w-[30px] h-[0.25rem] bg-white rounded-full"></div>
                    </button>
                </div>
                <div class="navbar-list flex flex-col items-start md:flex-row md:items-end md:gap-10">
                    <a class="text-md py-2 hover:opacity-75" href="#">Find Jobs</a>
                    <a class="text-md py-2 hover:opacity-75" href="#">About Us</a>
                    <a class="text-md py-2 hover:opacity-75" href="#">Contact Jobs</a>
                    <button class="text-md mt-1 py-2 rounded-full md:bg-primary md:px-5 hover:opacity-75 flex flex-row justify-center align-center gap-2" type="submit"><p>Account</p><span class="material-symbols-outlined"><span class="material-symbols-outlined">arrow_drop_down</span></button>
                </div>
            </div>
        </nav>
        <div class="search-section overflow-hidden">
            <div class="search-section-container relative py-36 md:pt-96 md:pb-10 bg-[url('https://dailymedia.case.edu/wp-content/uploads/2020/01/16155303/nurse_smiling.jpg')] bg-cover bg-top">
                <div class="top-search-bar flex flex-col justify-end items-center px-4 md:px-5">
                    <h1 class="text-4xl font-bold font-roboto text-center text-white md:text-5xl mb-5">Your Gateway to Exceptional Travel Nursing Opportunities</h1>
                    <form action="" class="search-form container max-w-screen-lg flex flex-col align-center justify-center">
                        <div class="form-top flex flex-col md:flex-row align-center justify-center">
                            <select class="p-5 py-3 min-w-[300px] text-primary text-lg font-semibold rounded-t-2xl md:rounded-tr-none md:rounded-l-2xl border-none focus:outline-none focus:ring-0" name="" id="">
                                <option value="" selected disabled>Location</option>
                                <option value="">Quezon City</option>
                                <option value="">Makati City</option>
                                <option value="">Mandaluyong City</option>
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
        <div class="flex flex-col md:flex-row md:justify-evenly md:items-stretch w-full">
            <div class="flex-1 min-h-[300px] relative ">
                <img class="h-full w-full absolute object-cover top-0" src="https://cdn-cmdne.nitrocdn.com/hNJckCstFVQjUckKaelcVKoVJrzdTVkW/assets/images/optimized/rev-ce006a7/www.provocollege.edu/wp-content/uploads/2023/02/shutterstock_1724802532-scaled.jpg" alt="Sample Image">
            </div>
            <div class="bg-primary text-white p-10 m-0 md:w-1/2 flex flex-col">
                <h2 class="text-3xl font-bold mb-3">Why Us?</h2>
                <p class="text-md leading-5 mb-3">When you choose Northwest Nurses, you're joining a community of satisfied healthcare professionals who trust us for:</p>
                <div class="flex flex-col xl:flex-row gap-5">
                    <div class="my-2">
                        <p class="font-bold">Industry-Leading Technology:</p>
                        <p>Northwest Nurses uses cutting-edge technology to streamline processes and enhance your experience. Our user-friendly platform makes it easy to search for jobs, submit applications, and communicate with your recruiter, all from the convenience of your computer or mobile device.</p>
                    </div>
                    <div class="my-2">
                        <p class="font-bold">Personalized Support:</p>
                        <p>At Northwest Nurses, your success is our top priority. Our team of experienced recruiters provides personalized support every step of the way, from matching you with the perfect job to assisting with onboarding and beyond.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-3 flex flex-col justify-center items-center py-10 gap-5">
            <h1 class="text-3xl text-center font-extrabold">Most Recent Job Posting</h1>
            <div class="grid gap-5 lg:grid-cols-2 2xl:grid-cols-3">
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
            <button class="bg-primary mt-3 hover:opacity-75 text-white px-5 py-2 rounded-full whitespace-nowrap">More Jobs</button>
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
            <button class="bg-white mt-3 hover:opacity-75 text-primary font-bold px-5 py-2 rounded-full whitespace-nowrap">More Jobs</button>
            </div>

        </div>
        
        
        <footer class="bg-black text-white w-full py-12">
            <div class="container mx-auto px-3 md:px-0">
                <img class="max-w-[150px]" src="https://seeklogo.com/images/N/NVIDIA-logo-BA019CBFAA-seeklogo.com.png" alt="">
                <div class="flex flex-col lg:flex-row lg:justify-start lg:items-start mt-3 gap-10">
                    <div class="md:min-w-96">
                        <h1 class="text-xl font-extrabold">Ready to take the next step in your nursing career?</h1>
                        <p class="text-lg">Reach out to Northwest Nurses today to learn more about our exciting opportunities.</p>
                        <p class="mt-5">info@northwestnurses.com</p>
                    </div>
                    <div class="grow flex flex-col 2xl:flex-row 2xl:justify-between gap-8">
                        <div class="2xl:flex-1">
                            <h3 class="font-bold">For Employers</h3>
                            <p class="mt-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro quidem veritatis aliquam aut excepturi provident numquam quis pariatur nostrum. Nam ea consequuntur a aut molestiae veritatis quasi quidem voluptatibus consectetur?</p>
                        </div>
                        <div class="2xl:flex-1">
                            <h3 class="font-bold">For Applicants</h3>
                            <p class="mt-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro quidem veritatis aliquam aut excepturi provident numquam quis pariatur nostrum. Nam ea consequuntur a aut molestiae veritatis quasi quidem voluptatibus consectetur? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo, optio in sed reiciendis, voluptas minima cupiditate quasi nihil enim cumque exercitationem est autem? Voluptatum itaque aliquid et, quidem deleniti aspernatur.</p>
                        </div>
                        <div class="2xl:flex-1">
                            <h3 class="font-bold">About</h3>
                            <p class="mt-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro quidem veritatis aliquam aut excepturi provident numquam quis pariatur nostrum. Nam ea consequuntur a aut molestiae veritatis quasi quidem voluptatibus consectetur?</p>
                        </div>
                    </div>
                </div>
                <div class="mt-10">
                    <p class="text-gray-500">All rights reserve <span>{{ date('Y') }}</span></p>

                </div>
            </div>
        </footer>
        <script>
            $(document).ready(function() {
                $(window).resize(function() {
                    const viewPortWidth = $(window).width();
                    if (viewPortWidth > 768) {
                        $('.navbar-list').show();
                    }
                });
    
                $('.nav-hamburger').on('click', function() {
                    $('.navbar-list').slideToggle();
                });
    
                $('.navbar-list a').on('click', function() {
                    const viewPortWidth = $(window).width();
                    if (viewPortWidth <= 768) {
                        $('.navbar-list').slideToggle();
                    }
                });
            });
        </script>
    </body>
</html>
