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
        <nav class="bg-dark text-white">
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
        <div class="search-section overflow-hidden relative">
            <div class="z-[-1] bg-custom-gradient-y absolute inset-0"></div>
            <img class="absolute z-[-2] min-h-full min-w-full object-cover" src="https://dailymedia.case.edu/wp-content/uploads/2020/01/16155303/nurse_smiling.jpg" alt="">
            <div class="search-section-container min-h-96 md:min-h-[500px] relative flex flex-col justify-center md:justify-end">
                <div class="top-search-bar flex flex-col justify-end items-center px-4 md:px-5 md:mt-16 md:pb-10">
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
        <div class="container mx-auto px-3 flex flex-col lg:flex-row lg:justify-around py-10 gap-5">
            <div class="job-listing grow md:mx-0 flex flex-col gap-5">
                @for ($i = 0; $i < 10; $i++)
                <div class="job-list-card lg:max-w-screen-sm bg-white border-2 border-gray-300 p-5 gap-5 rounded-xl">
                    <div class="job-list-card-header grow flex flex-row pb-3 justify-between gap-5">
                        <div>
                            <h2 class="font-bold text-2xl">ANCHORAGE, ALASKA</h2>
                            <h4 class="font-semibold text-xl">PRN Medical Surgical</h4>
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
                        <button class="bg-primary hover:opacity-75 text-white px-5 py-2 rounded-full whitespace-nowrap">View Job</button>
                    </div>
                </div>
                @endfor
                <div class="flex flex-row justify-center items-center lg:max-w-screen-sm gap-3">
                    <button class="bg-black hover:opacity-75 text-white py-2 px-5 rounded-full">Prev</button>
                    <p>1 - 10 of 5,330</p>
                    <button class="bg-black hover:opacity-75 text-white py-2 px-5 rounded-full">Next</button>
                </div>
            </div>
            <div class="job-info-section">
                <div class="sticky top-0 mx-auto max-w-screen-md bg-white border-2 border-gray-300 gap-5 rounded-xl overflow-hidden">
                    <div class="w-full max-h-64 overflow-hidden">
                        <img class="w-full" src="https://www.shutterstock.com/image-photo/aerial-view-sunset-over-downtown-600nw-2000550491.jpg" alt="">
                    </div>
                    <div class="p-5">
                        <div class="my-5">
                            <h2 class="font-bold text-2xl">PRN Medical Surgical, ANCHORAGE, ALASKA</h2>
                            <h2 class="font-bold text-2xl text-primary">$3,0492 - $5,839 weekly</h2>
                            <div class="flex flex-col sm:flex-row justify-between mt-5 gap-5">
                                <p class="text-gray-500">Job Contact | Job ID: 09201903901</p>
                                <button class="bg-primary hover:opacity-75 text-white px-5 py-2 rounded-full">Apply Now</button>
                            </div>
                        </div>
                        <hr class="border-t-2 border-gray-300">
                        <div class="overflow-y-auto max-h-[450px]">
                            <div class="my-5">
                                <h1 class="text-2xl font-extrabold">Job Details</h1>
                                <div class="flex flex-col gap-2 my-3">
                                    <div class="flex gap-3 text-gray-600">
                                        <span class="material-symbols-outlined">medical_services</span>
                                        <p>Profession:</p>
                                    </div>
                                    <div class="flex gap-3 text-gray-600">
                                        <span class="material-symbols-outlined">group</span>
                                        <p>Pay:</p>
                                    </div>
                                    <div class="flex gap-3 text-gray-600">
                                        <span class="material-symbols-outlined">schedule</span>
                                        <p>Assignment Length:</p>
                                    </div>
                                    <div class="flex gap-3 text-gray-600">
                                        <span class="material-symbols-outlined">medical_services</span>
                                        <p>Schedule:</p>
                                    </div>
                                    <div class="flex gap-3 text-gray-600">
                                        <span class="material-symbols-outlined">group</span>
                                        <p>Openings:</p>
                                    </div>
                                    <div class="flex gap-3 text-gray-600">
                                        <span class="material-symbols-outlined">schedule</span>
                                        <p>Start Date:</p>
                                    </div>
                                    <div class="flex gap-3 text-gray-600">
                                        <span class="material-symbols-outlined">medical_services</span>
                                        <p>Experience:</p>
                                    </div>
                                </div>
                            </div>
                            <hr class="border-t-2 border-gray-300">
                            <div class="my-5">
                                <h1 class="text-2xl font-extrabold">Full Job Description</h1>
                                <p class="my-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, id aut in doloremque vero minus animi, eos ipsam illo voluptatibus culpa impedit? Dolorum excepturi vero fugit dolorem aspernatur laborum facilis?</p>
                                <p class="my-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam, autem iure dolorum, impedit ut doloribus explicabo sed necessitatibus deleniti odio laborum dignissimos quo exercitationem? Earum architecto voluptatibus eligendi expedita minus!</p>
                            </div>
                            <div class="mt-8">
                                <h1 class="text-xl font-extrabold">Responsibilities:</h1>
                                <p>To perform something</p>
                                <p>To perform something else</p>
                                <p>To perform something else again</p>
                                <p>To perform something</p>
                                <p>To perform something</p>
                            </div>
                            <div class="mt-8">
                                <h1 class="text-xl font-extrabold">Requirements:</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, id aut in doloremque vero minus animi, eos ipsam illo voluptatibus culpa impedit? Dolorum excepturi vero fugit dolorem aspernatur laborum facilis?</p>
                                <p class="my-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam, autem iure dolorum, impedit ut doloribus explicabo sed necessitatibus deleniti odio laborum dignissimos quo exercitationem? Earum architecto voluptatibus eligendi expedita minus!</p>
                            </div>
                        </div>
                    </div>
                </div>
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
